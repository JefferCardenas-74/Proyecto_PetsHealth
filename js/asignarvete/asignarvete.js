var primeraFila;
var primeraFilaAsignar;
var idCita;
$(function(){

    primeraFila=$("#fila");
    primeraFilaAsignar=$("#filaAsignarVete");

    listarCitas();

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

            $.each(resultado.datos, function(i,cita){
        
                $("#VidCita").html(cita.idCita);
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
    listarVeterinarios();
}

function listarVeterinarios(){

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

        }
    })
}