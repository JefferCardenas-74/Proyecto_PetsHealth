var primeraFila;
var primeraFilaAsignar;
var idCita;
$(function(){

    primeraFila=$("#fila");
    primeraFilaAsignar=$("#filaAsignarVete");

    listarCitas();
    listarVeterinarios();

    $("#btn_asignarVete").click(function(){
        asignarVeterinario();
        listarCitas();
    });

});

function listarCitas(){
    $(".fila").remove();
    $("#tbl_AsignarVete tbody").append(primeraFilaAsignar);

    var parametros={
        accion: "listarCitasAsignar",
    };


    $.ajax({
        url: "../../../controlador/citaControl.php",
        data: parametros,
        type:"post",
        dataType:"json",
        cache:false,

        success:function(resultado){
            console.log(resultado);
            $.each(resultado.datos, function(i,cita){
        
                $("#VidCita").html(i+1);
                $("#VFechayHora").html(cita.ciFecha);
                $("#VTipoCita").html(cita.serTipo);
                $("#VSolicitante").html(cita.perNombre);
                $("#btn_mostrarModal").attr("onclick", "abrirModal(" + cita.idCita + ")");
                $("#tbl_AsignarVete tbody").append(primeraFilaAsignar.clone(true).attr("class", "fila"));
            });
            $("#tbl_AsignarVete tbody tr").first().remove();
        },
        error: function(ex){
            console.log(ex.responseText,"no trae nada");
        }

    });
}

function abrirModal(id){
    idCita=id;
    console.log(idCita);
    listarVeterinarios();
}

function listarVeterinarios(){
     $(".otrafila").remove();
    var parametros={
        accion:"listarVeterinarios"
    };
    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type:"post",
        dataType:"json",
        cache:false,
        
        success:function(resultado){
            console.log(resultado);
            $.each(resultado.datos, function(i,veterinario){
                $("#cbVeterinarios").append($("<option>",
                {
                    value:veterinario.idEmpleado, 
                    text :veterinario.perNombre + "  " + veterinario.perApellido,
                    "class":"otrafila"
                }));
            });
        },
        error: function(ex){
            console.log(ex.responseText, "no llega nada");
        }
    });
}

function asignarVeterinario(){
    var parametros = {
        accion : "AsignarVeterinario",
        idCita: idCita,
        idVeterinario:$("#cbVeterinarios").val()
    }
    //console.log(parametros);
    $.ajax({
        url: "../../../controlador/citaControl.php",
        data: parametros,
        type:"post",
        dataType:"json",
        cache:false,

        success:function(resultado){

            console.log(resultado);
            
            if(resultado.estado){
                Swal.fire({
                    title: "Asignado Veterinario",
                    text: "Veterinario Asignado con exito..!",
                    icon: "success",
                    ConfirmButtonText: "Ok",
                    customClass: {
                        confirmButton: 'btnAceptar'
                      }
                });
                listarCitas();
            }else{
                Swal.fire({
                    title: 'Oops',
                    text: 'Ha ocurrido un error a la hora de asignar el veterinario. Revise',
                    icon: 'error',
                    ConfirmButtonText: 'Ok',
                    customClass: {
                        confirmButton: 'btnAceptar'
                      }
                });
            }
        },
        error: function(ex){
            console.log(ex.responseText, "no llega nada");
        }
    });
}  

