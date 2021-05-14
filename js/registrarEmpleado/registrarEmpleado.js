
var nombreRol="";

$(function(){
    /**funciones para llenar los select dinamicamente*/
    listarRol();
    /**---------------------------------------------- */

    /**evento de escucha del boton btn_registrar para ejecutar la funcion de agreagar empleado*/
    $('#btn_registrar').click(function(){
        agregarEmpleado();
    });

    $('#btn_consultar').click(function(){
        ConsultarEmpleado();
    });

    $('#btn_Actualizar').click(function(){
        ActualizarEmpleado();
    });


});

function listarRol(){

    var parametros = {
        accion: 'listarRol',
    };

    $.ajax({
        url: '../../../controlador/empleadoControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function(resultado){
            // console.log(resultado);

            $.each(resultado.datos, function(j, dato){
                const opcion = document.createElement('option');
                opcion.value = dato.idRol;
                opcion.text = dato.rolNombre;

                $('#cb_rol').append(opcion);
            });
            // obtengo el texto de la opcion escogida
        $("#cb_rol").change(function(){
            nombreRol=$("#cb_rol option:selected").text();
          });
            
        },
        error:function(e){

        }
    });
}

function agregarEmpleado(){

    /**se valida que los campos tengan datos */

    var identificacion = $('#txt_identificacion').val();
    var nombre = $('#txt_nombre').val();
    var apellido = $('#txt_apellido').val();
    var telefono = $('#txt_telefono').val();
    var correo = $('#txt_correo').val();

    if(identificacion == '' ||
        nombre == '' ||
        apellido == '' ||
        telefono == '' || 
        correo == '' ||
        $('#cb_rol').val() == 0){

        Swal.fire({
            title: 'Oops',
            text: 'Debe validar todos los campos.',
            icon: 'error',
            ConfirmButtonText: 'Ok'
        });


    }else if(buscarCe(nombre) == true || buscarCe(apellido) == true){

        Swal.fire({
            title: 'Oops',
            text: 'Los nombres y apellidos no puede tener caracteres especiales...!',
            icon: 'warning',
            ConfirmButtonText: 'Ok'
        });

    }else if(validarEmail(correo) == false){

        Swal.fire({
            title: 'Oops',
            text: 'El correo no valido',
            icon: 'warning',
            ConfirmButtonText: 'Ok'
        });

    }else{
        

        var parametros = {

            identificacion: $('#txt_identificacion').val(),
            nombre: $('#txt_nombre').val(),
            apellido: $('#txt_apellido').val(),
            correo: $('#txt_correo').val(),
            telefono: $('#txt_telefono').val(),
            rol: $('#cb_rol').val(),
            nombreRol:nombreRol, //se manda el nombre del rol
            accion: 'registrarEmpleado'
        };
        
        console.table(parametros);
    //     $.ajax({
    //         url: '../../../controlador/empleadoControl.php',
    //         data: parametros,
    //         dataType: 'json',
    //         type: 'post',
    //         cache: false,
    
    //         success: function(resultado){
    //             if(resultado.estado){
    //                 /**mustra una alerta de completado */
    //                 Swal.fire({
    //                     title: 'Registrado',
    //                     text: 'Empleado Registrado con exito..!',
    //                     icon: 'success',
    //                     ConfirmButtonText: 'Ok'
    //                 });
    
    //             }else{
    //                 /**mustra una alerta de error */
    //                 Swal.fire({
    //                     title: 'Oops',
    //                     text: 'Ha ocurrido un error a la hora del registro. Revise',
    //                     icon: 'error',
    //                     ConfirmButtonText: 'Ok'
    //                 });
    //             }
    //             /**funcion que limpia todos los campos de texto */
    //             limpiar();
    
    //         },
    //         error: function(e){
    
    //         }
    //     })
    }

}

function limpiar(){

    $('#txt_identificacion').val('');
    $('#txt_nombre').val('');
    $('#txt_apellido').val('');
    $('#txt_telefono').val(''); 
    $('#txt_correo').val('');
    $('#cb_rol').val(0);
}
