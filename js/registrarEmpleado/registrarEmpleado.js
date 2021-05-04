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
    


    var parametros = {

        identificacion: $('#txt_identificacion').val(),
        nombre: $('#txt_nombre').val(),
        apellido: $('#txt_apellido').val(),
        correo: $('#txt_correo').val(),
        password: $('#txt_password').val(),
        telefono: $('#txt_telefono').val(),
        rol: $('#cb_rol').val(),
        nombreRol:nombreRol, //se manda el nombre del rol
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

function ConsultarEmpleado(){
    var parametros={
        identificacion: $("#txt_identificacion").val(),
        accion:"ConsultarEmpleado"
    }

    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        dataType: "json",
        type: "post",
        cache: false,

        success: function(resultado){
            //console.log(resultado.datos);
            
            $.each(resultado.datos , function(i,persona){
                $("#idPersona").val(persona.idPersona);
                $("#txt_nombre").val(persona.perNombre);
                $("#txt_apellido").val(persona.perApellido);
                $("#txt_telefono").val(persona.perTelefono);
                $("#txt_correo").val(persona.perCorreo);
                $("#cb_rol").val(persona.idRol);
                console.log(persona.rolNombre);
            });   
        
        },
        error: function(ex){
            console.log(ex.responseText , "no llego nada");
            }
    });

}
