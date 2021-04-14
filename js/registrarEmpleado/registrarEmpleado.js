$(function(){

    /**funciones para llenar los select dinamicamente*/
    listarCargo();
    listarRol();
    /**---------------------------------------------- */

    /**evento de escucha del boton btn_registrar para ejecutar la funcion de agreagar empleado*/
    $('#btn_registrar').click(function(){
        agregarEmpleado();
    });
});

function listarCargo(){

    var parametros = {
        accion: 'listarCargo'
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
                opcion.value = dato.idCargo;
                opcion.text = dato.carNombre;

                $('#cb_cargo').append(opcion);
            });
        },
        error:function(e){

        }
    });
}

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

            if(resultado.estado){
                alert('agregado correctamente..! :)');
            }else{
                alert('ocurrio un error..! :(' + resultado.mensaje);
            }

        },
        error: function(e){

        }
    })
}