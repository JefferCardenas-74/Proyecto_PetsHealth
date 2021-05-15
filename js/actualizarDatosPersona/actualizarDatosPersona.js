
var idPersona=null;

$(function () {

    listarPersona();

    $("#btnActualizarDatos").click(function () {

        var identificacion = $("#txt_identificacion").val();
        var nombre = $("#txt_nombre").val();
        var apellido = $("#txt_apellido").val();
        var telefono = $("#txt_telefono").val();
        var correo = $("#txt_correo").val();

        if(identificacion == "" ||
            nombre == "" ||
            apellido == "" ||
            telefono == "" ||
            correo == "" 
        ) {
            alertaCamposVacios();
    
        } else if(buscarCe(nombre) == true || buscarCe(apellido)) {
            
            alertaInputCaracteres();

        }else if(!validarEmail(correo)){

          alertaCorreoInvalido();

        }else{

            actualizarPersona();
        }
    });
});


function listarPersona() {

    let parametros = {
        accion: "listarUsuario",
    };

    $.ajax({
        url: "../../../controlador/usuarioControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if (resultado.estado) {
                let datos = resultado.datos;
                idPersona=datos.idPersona;
                $("#txt_identificacion").val(datos.perIdentificacion);
                $("#txt_nombre").val(datos.perNombre);
                $("#txt_apellido").val(datos.perApellido);
                $("#txt_telefono").val(datos.perTelefono);
                $("#txt_correo").val(datos.perCorreo);
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });
}

function actualizarPersona() {

    let parametros = {
        accion: "actualizarPersona",
        idPersona: idPersona,
        identificacion: $("#txt_identificacion").val(),
        nombre: $("#txt_nombre").val(),
        apellido: $("#txt_apellido").val(),
        telefono: $("#txt_telefono").val(),
        correo: $("#txt_correo").val(),
    };

    $.ajax({
        url: "../../../controlador/usuarioControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if (resultado.estado) {
                Swal.fire({
                    title: 'Muy bien',
                    text: 'Usuario actualizado con exito.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    customClass: {
                        confirmButton: 'btnAceptar',
                    }
                }).then((result)=>{

                    if(result.isConfirmed){

                        window.location.reload(); 
                        listarPersona();
                    }
                });
            }else{
                alertaError();
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });

}
