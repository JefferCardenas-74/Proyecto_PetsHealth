// variables para la validadcion de intentos
var numeroIntentos = 3;
var count = 0;
var restantes = 3;
var idPersona;
var rol;

$(function () {
  cargarElementos();

  rol = $("#rolPersona").val();
  console.log(rol);

  if (rol == "Empleado") {
    $("#btn_volverCitaNoPro").css("display", "block");
    $("#btn_volverCitaNoPro").click(() => {
      window.location.href =
        "../../empleado/citasAsignadas/?page=frm_citasNoProgramadas";
    });
  } else {
    $("#btn_volverCitaNoPro").css("display", "none");
  }
  /*EVENTOS DE INCIO DE SESION */
  $(".txtCrearCuenta").click(function () {
    $("#crearCuenta").modal();
    listarTipoMascota();
  });

  $(".btnLogin").click(function () {
    if ($("#txt_user").val() != "" && $("#txt_password").val() != "") {
      iniciarSesion();
    } else {
      alertaCamposVacios();
    }
  });

  //EVENTOS DE RECUPERAR CONTRASEÑA
  mostrarModalPassword();
  cerrarModalPassword();

  $("#txt_olvidoPassword").change(function () {
    if(!validarEmail($("#txt_olvidoPassword").val())){
      alertaCorreoInvalido();
    }
    obtenerUsuario();
  });

  $("#btn_olvidoContrasenia").click(function () {
    if ($("#txt_olvidoPassword").val() !== "") {
      enviarCorreoRecuperacionContrasenia();
    } else {
      alertaCamposVacios();
    }
  });

  $("#btn_registrar").click(function () {
    if (
      $("#txt_cedula").val() == "" ||
      $("#txt_nombre").val() == "" ||
      $("#txt_apellidos").val() == "" ||
      $("#txt_telefono").val() == "" ||
      $("#txt_correo").val() == "" ||
      $("#txt_nombreMascota").val() == "" ||
      $("#txt_edadMascota").val() == "" ||
      $("#dt_fechaNacimientoMascota").val() == "" ||
      $("#cb_tipoMascota").val() == "0"
    ) {
      alertaCamposVacios();
    } else if (!validarEmail($("#txt_correo").val())) {
      alertaCorreoInvalido();
    } else {
      registrarPersona();
    }
  });
});

function mostrarPassword() {
  let inputPassword = document.querySelector(".password");
  if (inputPassword.type === "password") {
    inputPassword.type = "text";
  } else {
    inputPassword.type = "password";
  }
}



const cargarElementos = () => {
  var element = document.getElementById("dt_fechaNacimientoMascota");
  datepicker = new Datepicker(element, {
    language: "es",
    buttonClass: "btn",
    format: "yyyy-mm-dd",
    // fecha minima
    maxDate: "data-date",
  });
  // Establecer libreria de selects personalizados
  // establecer el select de horas
  //$("#cb_tipoMascota").select2({
    //language: {
      //noResults: function () {
        //return "No encontramos el tipo para tu mascota :(";
      //},
      //searching: function () {
        //return "Buscando..";
      //},
    //},
  //});
};

function limpiarFormulario() {
  let numeroCedula = document.querySelector("#txt_cedula");
  numeroCedula.value = "";
  let nombreCliente = document.querySelector("#txt_nombre");
  nombreCliente.value = "";
  let apellidosCliente = document.querySelector("#txt_apellidos");
  apellidosCliente.value = "";
  let telefonoCliente = document.querySelector("#txt_telefono");
  telefonoCliente.value = "";
  let correoCliente = document.querySelector("#txt_correo");
  correoCliente.value = "";
  let nombremascotaCliente = document.querySelector("#txt_nombreMascota");
  nombremascotaCliente.value = "";
  let fechaNacimientoMascotaCliente = document.querySelector("#dt_fechaNacimientoMascota");
  fechaNacimientoMascotaCliente.value = "";
  $('#cb_tipoMascota').val(0);
}

function iniciarSesion() {
  $.ajax({
    url: "../../../controlador/usuarioControl.php",
    data: $("#frm_login").serialize(),
    dataType: "json",
    type: "post",
    cache: "false",
    //ANTES de enviar se poone el boton el siguinete texto
    beforeSend: function () {
      $("#btn_iniciarSesion").text("Validando datos....");
      $("#btn_iniciarSesion").prop("disabled", true);
      $("#btn_iniciarSesion").css({
        background: "#3000ff8f",
      });
    },
    success: function (resultado) {
      console.groupCollapsed("%cResultados del la peticion", "color:#16C7E1"); // creacion de un grupo en console
      console.dir(resultado); // con dir muestro el tipo de dato que llega
      console.groupEnd(); //Cierro el grupo
      count++;
      restantes--;
      if (count <= numeroIntentos) {
        console.log("%cCantidad de intentos", "color:white", count); //impimre la cantidad de intentos
        // preguntamos si los datos que llegan son diferente a null
        if (resultado.datos.idUsuario !== null) {
          // si pudo entrar , el numero de intentos cambia a cero
          count = 0;
          console.log("%cReinicio del contador a =", "color:blue", count);
          // pregiuntat si el estado es activo
          if (resultado.datos.usuEstado === 1) {
            switch (resultado.datos.rolNombre) {
              // y lo redirije para cada vista
              case "Administrador":
                // barra que inidica el estado
                const Toast = Swal.mixin({
                  toast: true,
                  position: "center",
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                });
                Toast.fire({
                  icon: "success",
                  title: "Cargando Usuario...",
                }).then((result) => {
                  // si ya se acabo el tiempo
                  if (result.dismiss === Swal.DismissReason.timer) {
                    // lo reirije a la vista
                    console.clear();
                    $(location).attr("href", "../../../vista/administrador/");
                  }
                });

                break;
              case "Empleado":
                const Toast2 = Swal.mixin({
                  toast: true,
                  position: "center",
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                });
                Toast2.fire({
                  icon: "success",
                  title: "Cargando Usuario...",
                }).then((result) => {
                  // si ya se acabo el tiempo
                  if (result.dismiss === Swal.DismissReason.timer) {
                    // lo reirije a la vista
                    console.clear();
                    $(location).attr("href", "../../../vista/empleado/");
                  }
                });

                break;
              case "Cliente":
                const Toast3 = Swal.mixin({
                  toast: true,
                  position: "center",
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                });
                Toast3.fire({
                  icon: "success",
                  title: "Cargando Usuario...",
                }).then((result) => {
                  // si ya se acabo el tiempo
                  if (result.dismiss === Swal.DismissReason.timer) {
                    // lo reirije a la vista
                    console.clear();
                    $(location).attr("href", "../../../vista/cliente/");
                  }
                });

                break;
            }
          } else {
            Swal.fire({
              icon: "info",
              title: "Usuario inactivo",
              text: "Comuniquese con el Administrador para mas informacion",
              customClass: {
                confirmButton: "btnAceptar",
              },
            });
            // cambia el texto asu estado inicial
            $("#btn_iniciarSesion").text("Ingresar");
            $("#btn_iniciarSesion").prop("disabled", false);
          }
        } else {
          //    en caso de que no sea asi botara el mensaje del controlador
          // $(location).attr('href','../Vista/?page=Login/frmLogin&x=2');
          const Toast = Swal.mixin({
            toast: true,
            position: "center",
            showConfirmButton: false,
            // tiempo que esta la barra de progreso
            timer: 2000,
            timerProgressBar: true,
            // cuando el mouse entra
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });

          Toast.fire({
            icon: "warning",
            title:
              "Datos incorrectos. intentos restantes <span class=text-danger> : " +
              restantes +
              "</span>",
          });
          // cambia el texto asu estado inicial
          $("#btn_iniciarSesion").text("INGRESAR");
          $("#btn_iniciarSesion").prop("disabled", false);
          $("#btn_iniciarSesion").css({
            background: "linear-gradient(to right, #8E2DE2, #4A00E0)",
          });
          // alert(resultado.mensaje);
        }
      } else {
        /**
         * agrego un modal con recaptcha
         */
        mostrarRecaptcha();
      }
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}

/**
 * carga el recaptcha si supera la cantidad de intentos
 */
function mostrarRecaptcha() {
  Swal.fire({
    title: "<h2 class='fredoka'>VERIFICACIÓN</h2>",
    // id para mas  poner estilos css
    html: '<div id="recaptcha"  ></div>',
    footer: " <p > Pasaste el numero de intentos por esta razon verificamos.</p> ",
    confirmButtonText: "Aceptar",
    customClass: {
      confirmButton: "btnAceptar",
    },
    // funciones para no poder saltar la ventana emergente
    allowOutsideClick: false,
    allowEscapeKey: false,
    didOpen: function () {
      grecaptcha.render("recaptcha", {
        // clave secreta de la web google de recaptcha
        sitekey: "6LdcndkaAAAAAENtw4BZMkhGTcGsrMwF9KXbml4N",
      });
    },
    preConfirm: function () {
      if (grecaptcha.getResponse().length === 0) {
        Swal.showValidationMessage(`Por favor comprueba que no eres un robot`);
      }
      // si ya se valido que no es un robot se reiniciia el contador ,el de restantes y pone el texto del
      //boton como estaba antes
      restantes = 3;
      count = 0;
      console.log("%cReinicio del contador a =", "color:blue", count);
      $("#btn_iniciarSesion").text("INGRESAR");
      $("#btn_iniciarSesion").prop("disabled", false);
      $("#btn_iniciarSesion").css({
        background: "linear-gradient(to right, #8E2DE2, #4A00E0)",
      });
    },
  });
}

/**
 * Carga la modal para recuperar contraseña
 */
function mostrarModalPassword() {
  $("#msgUser").hide(); //oculta el span para mostrar mensaje
  /*evento escucha para activarl el modal */
  $(".olvidoPassword").click(function () {
    $("#olvidoPasswordModal").modal();
  });

  // $("#btn_cerrarOlvidoContrasenia").click(function () {
  //   $("#olvidoPasswordModal").modal('hide');

  //   // destruyo todo los elementos del modal si se cerro
  //   $("#btn_olvidoContrasenia").prop("disabled", false);
  //   $("#btn_olvidoContrasenia").css({
  //     background: 'linear-gradient(to right, #8E2DE2, #4A00E0)'
  //   });
  //   $("#msgUser").hide();
  //   $("#txt_olvidoPassword").val("");
  //   $("#txt_olvidoPassword").css({
  //     border: 'none'
  //   });

  // });
}
function cerrarModalPassword() {
  // Detectar cuando modal se cerro
  $("#olvidoPasswordModal").on("hidden.bs.modal", function () {
    // destruyo todo los elementos del modal si se cerro
    $("#btn_olvidoContrasenia").prop("disabled", false);
    $("#btn_olvidoContrasenia").css({
      background: "linear-gradient(to right, #8E2DE2, #4A00E0)",
    });
    $("#msgUser").hide();
    $("#txt_olvidoPassword").val("");
    $("#txt_olvidoPassword").css({
      border: "none",
    });
  });
}
function obtenerUsuario() {
  // se manda la accion y el value del input del correo al controlador
  let parametros = {
    accion: "obtenerUsuario",
    usuario: $("#txt_olvidoPassword").val(),
  };
  $.ajax({
    url: "../../../controlador/usuarioControl.php",
    data: parametros,
    dataType: "json",
    type: "post",
    cache: "false",
    success: function (resultado) {
      console.log(resultado);
      if (resultado.datos) {
        $("#txt_olvidoPassword").css({
          border: "2px solid var(--colorBarra2) ",
        });
        // // activo el boton
        $("#btn_olvidoContrasenia").prop("disabled", false);
        $("#btn_olvidoContrasenia").css({
          background: "linear-gradient(to right, #8E2DE2, #4A00E0)",
        });
        // oculta el mensaje
        $("#msgUser").hide();
      } else {
        // cambia el border del input
        $("#txt_olvidoPassword").css({
          border: "2px solid var(--colorBoton1)",
        });
        $("#btn_olvidoContrasenia").text("Enviar");
        // //  desactivo el buttom para que no pueda dar click
        $("#btn_olvidoContrasenia").prop("disabled", true);
        $("#btn_olvidoContrasenia").css({
          background: "#3000ff8f",
        });
        // muestra el mensaje cuando el correo este mal
        $("#msgUser").show();
        $("#msgUser").text(resultado.mensaje);
      }
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}

function enviarCorreoRecuperacionContrasenia() {
  // se manda la accion y el value del input del correo al controlador
  let parametros = {
    accion: "enviarCorreoRecuperacionContrasenia",
    usuario: $("#txt_olvidoPassword").val(),
  };
  $.ajax({
    url: "../../../controlador/usuarioControl.php",
    data: parametros,
    dataType: "json",
    type: "post",
    cache: "false",
    // Antes de enviar se desactian el input y el boton
    beforeSend: function () {
      $("#btn_olvidoContrasenia").text("Cargando...");
      $("#btn_olvidoContrasenia").attr("disabled", true);
      $("#txt_olvidoPassword").prop("disabled", true);
      $("#btn_olvidoContrasenia").css({
        background: "#3000ff8f",
      });
    },
    success: function (resultado) {
      console.log(resultado);
      if (resultado.datos) {
        alertaCorreoRecuperarContrasenia();
        // se activan los botones
        $("#btn_olvidoContrasenia").text("Enviar");
        $("#txt_olvidoPassword").prop("disabled", false);
        $("#btn_olvidoContrasenia").attr("disabled", false);
        $("#txtRecuperarpassword").val("");
        // oculta modal
        $("#olvidoPasswordModal").modal("hide");
      }
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}

function registrarPersona() {
  var nombre = $("#txt_nombre").val();
  var apellidos = $("#txt_apellidos").val();


  if(
    buscarCe(nombre)== true ||
    buscarCe(apellidos)== true 

    ){
      Swal.fire({
          title: 'Oops',
          text: 'Los campos no puede tener caracteres especiales...!',
          icon: 'warning',
          ConfirmButtonText: 'Ok'
      });
  }else{
    var parametros = {
      accion: "AgregarCliente",

      cedula: $("#txt_cedula").val(),
      nombre: $("#txt_nombre").val(),
      apellidos: $("#txt_apellidos").val(),
      telefono: $("#txt_telefono").val(),
      correo: $("#txt_correo").val(),
    };

    $.ajax({
      url: "../../../controlador/clienteControl.php",
      data: parametros,
      dataType: "json",
      type: "post",
      cache: "false",

      success: function (resultado) {
        console.log(resultado.datos);

        idPersona = resultado.datos;
        agregarMascota();
      },
      error: function (e) {
        console.log(e);
      },
    });
  }
}

function agregarMascota() {

  /**se saca solo el ano de la fecha ingresada */
  var fecha = document.getElementById('dt_fechaNacimientoMascota').value;
  var year = fecha.toString().substr(0,4);
  var nombre = $("#txt_nombreMascota").val();

  if(buscarCe(nombre)== true ){
      Swal.fire({
          title: 'Oops',
          text: 'Los campos no puede tener caracteres especiales...!',
          icon: 'warning',
          ConfirmButtonText: 'Ok'
      });
  }else{

    let parametros = {
      accion: "AgregarMascota",
      idPersona: idPersona,
      nombreMascota: $("#txt_nombreMascota").val(),
      tipoMascota: $("#cb_tipoMascota").val(),
      fechaNacimientoMascota: fecha,
      año: year,
      //fechaNacimientoMascota:$("#dt_fechaNacimientoMascota").val(),
      

      
    };

    $.ajax({
      url: "../../../controlador/clienteControl.php",
      data: parametros,
      dataType: "json",
      type: "post",
      cache: "false",

      success: function (resultado) {
        console.log(resultado.mensaje);

        registrarUsuario();
      },
      error: function (e) {
        console.log(e);
      },
    });
  }
}

function registrarUsuario() {
  var parametros = {
    idPersona: idPersona,
    cedula: $("#txt_cedula").val(),
    correo: $("#txt_correo").val(),
    nombre: $("#txt_nombre").val(),
    apellido: $("#txt_apellidos").val(),
    accion: "AgregarUsuario",
  };

  $.ajax({
    url: "../../../controlador/clienteControl.php",
    data: parametros,
    dataType: "json",
    type: "post",
    cache: "false",
    beforeSend: function () {
      $("#btn_registrar").text("Procesando...");
      $("#btn_registrar").attr("disabled", true);
      $("#btn_registrar").css({
          background: '#3000ff8f'
          });
  },
    success: function (resultado) {
      $("#btn_registrar").text("Registrarse");
      $("#btn_registrar").attr("disabled", false);
      $("#btn_registrar").css({
          background: 'linear-gradient(to right, #8E2DE2, #4A00E0)'
          });
      console.log(resultado.mensaje);
      if (resultado.estado == true) {
        limpiarFormulario();
        alertaRegistroPersona();
      } else {
        alertaError();
      }
    },
    error: function (e) {
      console.log(e);
    },
  });
}

function listarTipoMascota() {
  $(".opcion").remove();
  let parametros = {
    accion: "ListarTM",
  };
  $.ajax({
    url: "../../../controlador/tipoMascotaControl.php",
    data: parametros,
    type: "post",
    dataType: "json",
    cache: false,

    success: function (resultado) {
      console.log(resultado);

      if (resultado.estado) {
        var tipoMascotas = resultado.datos;

        console.log(tipoMascotas);

        $.each(tipoMascotas, function (i, tipomascota) {
          var opcion = document.createElement("option");

          opcion.value = tipomascota.idTipoMascota;
          opcion.text = tipomascota.tipoCategoria;
          opcion.setAttribute("class", "opcion");
          $("#cb_tipoMascota").append(opcion);

          // $("#cb_tipoMascota").append("<option class='opcion' value="+ tipomascota.idTipoMascota +">"
          //   + tipomascota.tipoCategoria + "</option>");
        });
      }
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}