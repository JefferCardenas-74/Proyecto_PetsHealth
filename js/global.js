$(function () {

  cerrarSession();
  //EVENTOS DEL FORMULARIO DE CAMBIAR CONTRASEÑA 
  $("#btn_actualizarPassword").click(function () {
    if ($("#txt_passwordNueva").val() !== "" && $("#txt_passwordNueva2").val() !== "") {
      // la mandamos la accion agregar al controlador
      actualizarPassword();

    } else {
      Swal.fire({
        // title: "Campos vacios !",
        text: "Ingresa la contraseña nueva por favor ",
        icon: "warning",
        confirmButtonText: "Ok",
      });

    }

  });

  validacionPassword();


});











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
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si",
      cancelButtonText: "No",
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
        background: 'linear-gradient(to right, #8E2DE2, #4A00E0)'
      });
      $("#txt_passwordNueva").attr("disabled", false);

      $("#msgPassword").hide(); //esconde el mensaja
    } else {
      $("#btn_actualizarPassword").css({
        background: '#3000ff8f'
      });
      $("#btn_actualizarPassword").attr("disabled", true);
      $("#txt_passwordNueva").attr("disabled", true); //bloquea el input de arriba
      $("#msgPassword").show(); //muestra el mensaje
    }
  });

  $("#txt_passwordNueva").change(function () {
    if ($("#txt_passwordNueva2").val() !== "") {
      $("#txt_passwordNueva2").val("");//impia el input de txtPasswordNueva2
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
    idUsuario: $("#id_usuarioPassword").val()
  }
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
          footer: "<p class=text-muted  >Sera refirijido a la pagina de inicio </p>"
        });
        // limpia los campos
        $("#txt_passwordNueva").val("");
        $("#txt_passwordNueva2").val("");
        $("#id_usuarioPassword").val("");
        // borra la varibale de la url
        history.pushState({ data: true }, 'p', 'http://localhost/repositorio_desarrollo/vista/principal/cambiarContrasenia/');
        // lo reirije a la vista despues de 3 segundos
        window.setTimeout(function () {
          location.href = "../../../";
        }, 3000);

      } else {
        Swal.fire({
          title: "Error",
          icon: "error",
          confirmButtonText: "Ok",
          footer: resultado.mensaje
        });

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

// PARA VISTAS PRINCIPALES
  if(window.location=="http://localhost/repositorio_desarrollo/vista/administrador/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/empleado/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/cliente/#"){
    $(location).attr("href", "../../configuracion/cerrarSesion.php");
  }
// VISTA CLIENTE ,ADMINISTRACION, Y EMPLEADOS
  else if(
  //Cliente
  window.location=="http://localhost/repositorio_desarrollo/vista/cliente/agendarCita/#"
  ||window.location =="http://localhost/repositorio_desarrollo/vista/cliente/verCita/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/cliente/Historial_Mascota/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/cliente/actualizarDatos/#"
  // Empleado
  ||window.location=="http://localhost/repositorio_desarrollo/vista/empleado/actualizarDatos/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/empleado/citasAsignadas/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/empleado/citasAsignadas/index.php?page=frm_citasAsignadas#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/empleado/citasAsignadas/index.php?page=frm_citasNoProgramadas#"
  //Admin
  ||window.location=="http://localhost/repositorio_desarrollo/vista/administrador/registrarEmpleado/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/administrador/actualizarDatos/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/administrador/registrarEmpleado/#"
  ||window.location=="http://localhost/repositorio_desarrollo/vista/administrador/gestionProductos/#"){
  // lo reirije al script php que  cierrar la sesion 
   $(location).attr("href", "../../../configuracion/cerrarSesion.php");
  }

  
}