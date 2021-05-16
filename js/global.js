var url = location.pathname.split("/", 4); //obtener el nombre de la carpeta
var ulrCompleta = location.pathname.split("/"); //obtener la url completa

$(function () {
  // Cuando carga el js se asigna el id  a la clase logo
  $(".logo").attr("id", "irPrincipal");

  cerrarSession();
  //EVENTOS DEL FORMULARIO DE CAMBIAR CONTRASEÑA
  $("#btn_actualizarPassword").click(function () {
    if (
      $("#txt_passwordNueva").val() !== "" &&
      $("#txt_passwordNueva2").val() !== ""
    ) {
      // la mandamos la accion agregar al controlador
      actualizarPassword();
    } else {
      Swal.fire({
        // title: "Campos vacios !",
        text: "Ingresa la contraseña nueva por favor ",
        icon: "warning",
        confirmButtonText: "Aceptar",
        customClass: {
          confirmButton: 'btnAceptar'
        }
      });
    }
  });

  /**function para evitar que ejecute el evento de las etiquetas a con atributo href='#'
   * ya que esto hace que la pagina se vuelva a cargar
   */
  deshabilitarEventoHref();

  redirijirPrincipal();
  validacionPassword();

  /**///////////////////////////////////////////////////////////////////// */
  /**function para validar que no se digite caracteres especiales en los input de type number */
  var inputNumber = $('input[type="number"]');

  inputNumber.keypress((e) => {

    if(e.charCode < 48 || e.charCode > 57) return false;
  });
  /**///////////////////////////////////////////////////////////////////// */

});

function deshabilitarEventoHref() {
  /**se obtiene todas las etiquetas a */
  var elementos = document.querySelectorAll("a");

  /**a cada etiqueta a le vamos a asignar un evento click y obtenemos el valor de href
   * si es igual a '#', entonces se deshabilita el evento de esa etiqueta a.
   */
  elementos.forEach((elemento) => {
    elemento.addEventListener("click", (e) => {
      var contenido = elemento.getAttribute("href");

      if (contenido == "#") {
        e.preventDefault();
      }
    });
  });
}

function redirijirPrincipal() {
  /**
   * Redirige dependiendo de la vista que se encuentre
   */
  $("#irPrincipal").click(function () {
    console.log(url[3]); //obtengo el nombre de la vista
    if ("administrador" == url[3]) {
      $(location).attr(
        "href",
        "http://localhost/repositorio_desarrollo/vista/administrador/"
      );
    } else if ("cliente" == url[3]) {
      $(location).attr(
        "href",
        "http://localhost/repositorio_desarrollo/vista/cliente/"
      );
    } else if ("empleado" == url[3]) {
      $(location).attr(
        "href",
        "http://localhost/repositorio_desarrollo/vista/empleado/"
      );
    }
  });
}

/**
 * Cierra la sesion activa
 * y redirije al menu principal
 */
function cerrarSession() {
  // al dar click al link de cerrar session
  $("#cerrarSesion").click(function () {
    Swal.fire({
      title: "Desea cerrar sesion?",
      icon: "question",
      width: 400,
      showCancelButton: true,
      confirmButtonText: "Si",
      cancelButtonText: "No",
      customClass: {
        confirmButton: 'btnAceptar',
        cancelButton: 'btnCancelar'
      },
      // funciones para no poder saltar la ventana emergente
      allowOutsideClick: false,
      allowEscapeKey: false,
    }).then((result) => {
      // si es se presiono el notno qiue si se redirige ala metodo que cierrar sessuib
      if (result.isConfirmed) {
        //   creacion de de mixin
        const ToastSession = Swal.mixin({
          toast: true,
          position: "center",
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true,
        });
        ToastSession.fire({
          icon: "success",
          title: "Saliendo...",
        }).then((result) => {
          // si ya se acabo el tiempo
          if (result.dismiss === Swal.DismissReason.timer) {
            cerrarSesionDinamico();
          }
        });
      }
    });
  });
}

/**
 * Valida si los inputs de la
 * contraseña si son iguales
 */
function validacionPassword() {
  $("#msgPassword").hide();
  //para validar si son igiuales las contraseñas
  $("#txt_passwordNueva2").change(function () {
    if ($("#txt_passwordNueva2").val() === $("#txt_passwordNueva").val()) {
      $("#btn_actualizarPassword").attr("disabled", false);
      $("#btn_actualizarPassword").css({
        background: "linear-gradient(to right, #8E2DE2, #4A00E0)",
      });
      $("#txt_passwordNueva").attr("disabled", false);

      $("#msgPassword").hide(); //esconde el mensaja
    } else {
      $("#btn_actualizarPassword").css({
        background: "#3000ff8f",
      });
      $("#btn_actualizarPassword").attr("disabled", true);
      $("#txt_passwordNueva").attr("disabled", true); //bloquea el input de arriba
      $("#msgPassword").show(); //muestra el mensaje
    }
  });

  $("#txt_passwordNueva").change(function () {
    if ($("#txt_passwordNueva2").val() !== "") {
      $("#txt_passwordNueva2").val(""); //impia el input de txtPasswordNueva2
    }
  });
}
/**
 * Actualiza la contraseña del usuario
 *  */
function actualizarPassword() {
  let parametros = {
    accion: "actualizarPassword",
    password: $("#txt_passwordNueva").val(),
    idUsuario: $("#id_usuarioPassword").val(),
  };
  $.ajax({
    url: "../../../controlador/usuarioControl.php",
    data: parametros,
    dataType: "json",
    type: "post",
    cache: "false",
    success: function (resultado) {
      console.log(resultado);
      if (resultado.estado) {
        Swal.fire({
          title: "Listo",
          text: "Contraseña cambiada con exito",
          icon: "success",
          confirmButtonText: "Ok",
          footer:
            "<p class=text-muted  >Sera refirijido a la pagina de inicio </p>",
        });
        // limpia los campos
        $("#txt_passwordNueva").val("");
        $("#txt_passwordNueva2").val("");
        $("#id_usuarioPassword").val("");
        // borra la varibale de la url
        history.pushState(
          { data: true },
          "p",
          "http://localhost/repositorio_desarrollo/vista/principal/cambiarContrasenia/"
        );
        // lo reirije a la vista despues de 3 segundos
        window.setTimeout(function () {
          location.href = "../../../";
        }, 3000);
      } else {
        alertaError();
      }
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}

/**
 * Cierra la session
 * dea cuerdo a la url
 *
 */
function cerrarSesionDinamico() {
  if (ulrCompleta.length == 5) {
    $(location).attr("href", "../../configuracion/cerrarSesion.php");
  } else if (ulrCompleta.length == 6) {
    $(location).attr("href", "../../../configuracion/cerrarSesion.php");
  }
}

function mostrarPassword() {
  let inputPassword = document.querySelector(".passwordNueva2");
  if (inputPassword.type === "password") {
    inputPassword.type = "text";
  } else {
    inputPassword.type = "password";
  }
}


/**
 * Funcion para mostrar cuando los inputs estan vacios
 */
 function alertaCamposVacios() {
  Swal.fire({
    title: "Campos vacios !",
    text: "Ingresa datos por favor",
    icon: "warning",
    confirmButtonText: "Aceptar",
    customClass: {
      confirmButton: 'btnAceptar'
    }
  });
  
}
/**
 * Funcion cuando se registra un usuario 
 */
function alertaRegistroPersona() {
  Swal.fire({
    title: "La información se guardo correctamente",
    icon: "success",
    confirmButtonText: "Aceptar",
    footer:"<p class=text-muted  >Revisa el correo electronico"+ 
    " por favor </p>",
    customClass: {
      confirmButton: 'btnAceptar'
    }
  });
}
/**
 * Funcion cuando se produce un error al guardar modificar etc
 */
function alertaError() {
  Swal.fire({
    title: "Ops ",
    text: "Ocurrio un problema",
    icon: "error",
    confirmButtonText: "Aceptar",
    customClass: {
      confirmButton: 'btnAceptar'
    }
  });
}

/**alerta para indicar que el correo es invalido */
function alertaCorreoInvalido(){

  Swal.fire({
    icon: 'warning',
    title: 'Advertencia',
    text: 'El formato del correo no es valido.',
    confirmButtonText:'Aceptar',
    customClass:{
        confirmButton:'btnAceptar'
    },
    footer:'Ejemplo de correo: example@example.com'
  });

}
/**alerta para indicar cuando los input type text tienen caracteres */
function alertaInputCaracteres(){

  Swal.fire({
    icon: 'warning',
    title: 'Advertencia',
    text: 'Los nombres y apellidos no pueden tener caracteres especiales.',
    confirmButtonText:'Aceptar',
    customClass:{
        confirmButton:'btnAceptar'
    }
  });
  
}

/**funcion que toma un string como entrada y valida que este no tenga caracteres especiales
 * true si contiene caracteres y false si no 
 */

 function buscarCe(string){

  if((string.search(/[^a-zA-Z0-9]/g)) != -1){

      return true;
  
  }else{
      return false;
  }
}

/**funcion toma un string y valida que este formateado basado en la expresio regular regexEmail
 * si se cumple esta expresion la funcion retorna true indicando que el correo es valido
 * de lo constraio retorna false indicando que no lo es
 */
function validarEmail(string){

  let regexEmail = /[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+/g;

  if(string.search(regexEmail) != -1){
      return true;
  }else{
      return false;
  }
}
