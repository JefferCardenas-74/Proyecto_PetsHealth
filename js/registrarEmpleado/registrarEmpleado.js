$(function(){

    /**funciones para llenar los select dinamicamente*/
    listarRol();
    /**---------------------------------------------- */

    /**evento de escucha del boton btn_registrar para ejecutar la funcion de agreagar empleado*/
    $('#btn_registrar').click(function(){
        agregarEmpleado();
    });
});

function listarRol(){

    var parametros = {
        accion: 'listarRol'
    };

    $.ajax({
        url: '../../../controlador/empleadoControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function(resultado){
            console.log(resultado);

            $.each(resultado.datos, function(j, dato){
                const opcion = document.createElement('option');
                opcion.value = dato.idRol;
                opcion.text = dato.rolNombre;

                $('#cb_rol').append(opcion);
            });
        },
        error:function(e){

        }
    });
}

function agregarEmpleado(){


    var parametros = {

        identificacion: $('#txt_identificacion').val(),
        nombre: $('#txt_nombre').val(),
        apellido: $('#txt_apellido').val(),
        correo: $('#txt_correo').val(),
        password: $('#txt_password').val(),
        telefono: $('#txt_telefono').val(),
        fechaIngreso: $('#txt_fechaIngreso').val(),
        cargo: $('#cb_cargo').val(),
        rol: $('#cb_rol').val(),
        accion: 'registrarEmpleado'
    };

    $.ajax({
        url: '../../../controlador/empleadoControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function(resultado){

            if(resultado.estado == true){
                
                Swal.fire({
                    title: 'Registrado',
                    text: 'Empleado Registrado con exito..!',
                    icon: 'success',
                    ConfirmButtonText: 'Ok'
                });

            }else{
                
                Swal.fire({
                    title: 'Oops',
                    text: 'Ha ocurrido un error a la hora del registro. Revise',
                    icon: 'Error',
                    ConfirmButtonText: 'Ok'
                });
            }

        },
        error: function(e){

        }
    })
}