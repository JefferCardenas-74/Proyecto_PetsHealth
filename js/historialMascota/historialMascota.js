var primeraFila;
var primeraFilaHistorial;
var HistorialMascota=[];
var validacion;
var rol;
var persona;

//var dato = <?php echo json_encode($validacion); ?>;

$(function(){
    primeraFila=$("#fila");
    primeraFilaHistorial=$("#filaHistorialM");
    rol =$("#rol").val();
    persona=$("#persona").val();


    
    if(rol == "Cliente"){
        $(".buscador").css({
            display: 'none'
        });
        $("#btn_mostrarModal").css({
            display: 'none'
        });
        ListarMascotasClienteH();
    }else{
        $(".buscador").css({
            display: 'block'
        });
    }

    $("#btn_buscar").click(function(){
        $("accion").val("Buscar");
        if($("#busquedaEncargado").val() !==""){
            ListarMascotasEncargado();
        }else{
            alert("DIGITE SU CEDULA ");
        }
    });
    $("#cb_mascota").click(function(){
        $("accion").val("0");
        ListarMascotaSele();
        ListarConsultaHistorialM();
    });
    $("#btn_actualizarDescripcion").click(function(){
        ActualizarDescripcion();
    });

    
});


    
/**
 * Listado de mascotas seleccionado por el encargado
 */
function ListarMascotasEncargado(){

    $("#cb_mascota").empty().append('<option>Seleccione: </option>');

    var parametros={
        accion:"ListarMascotasEn",
        identificacion:$("#busquedaEncargado").val()
    };
    $.ajax({
        url:"../../../controlador/controlHistorialM.php",
        data:parametros,
        type:"post",
        dataType:"json",
        cache:false,

        success:function(resultado){
            console.log(resultado);
            if(resultado.estado){
                var mascotas= resultado.datos;
                console.log(mascotas);
                $.each(mascotas, function(i, mascota){
                    $("#cb_mascota").append("<option value="+ mascota.idMascota +">" 
                    + mascota.masNombre + "</option>");
                });
            }
        },
        error: function(ex){
            console.log(ex.responseText , "no llego nada");
        }
        });
}



     

/**
 * lista datos de la mascota seleccionada
 */
function ListarMascotaSele(){

    var parametros={
        accion:"ListarMascota",
        idMascota:$("#cb_mascota").val()
    };
    $.ajax({
        url:"../../../controlador/controlHistorialM.php",
        data:parametros,
        type:"post",
        dataType:"json",
        cache:false,

        success:function(resultado){
            console.log(resultado);
            
            $.each(resultado.datos, function(i,mascota){
                $("#lbl_nombre").html(mascota.perNombre);
                $("#lbl_cedula").html(mascota.perIdentificacion);
                $("#lbl_nombreM").html(mascota.masNombre);
                $("#lbl_razaM").html(mascota.razaTipo);
                $("#lbl_edadM").html(mascota.masEdad);
            
            });
        },
        error: function(ex){
            console.log(ex.responseText , "no llego nada");
        }
    });
}
/**
 * Lista datos de la tabla HistorialM
 */
function ListarConsultaHistorialM(){
    $(".fila").remove();
    $("#tbl_historialMascota tbody").append(primeraFilaHistorial);
    var parametros={
        accion:"ListarConsulta",
        idMascota:$("#cb_mascota").val(),
    };
    console.log(parametros);
    $.ajax({
        url:"../../../controlador/controlHistorialM.php",
        data:parametros,
        type:"post",
        dataType:"json",
        cache:false,

        success:function(resultado){
            HistorialMascota=resultado.datos;
            console.log(HistorialMascota);
            $.each(resultado.datos, function(i,mascota){

                $("#hFechayHora").html(mascota.ciFecha);
                $("#hDescripcion").html(mascota.deDescripcion);
                $("#hTipoCita").html(mascota.serTipo);
                $("#hResponsable").html(mascota.perNombre);
                $("#btn_mostrarModal").attr("onclick", "abrirModal(" + i + ")");
                $("#tbl_historialMascota tbody").append(primeraFilaHistorial.clone(true).attr("class", "fila"));
            });
            $("#tbl_historialMascota tbody tr").first().remove();
        },
        error: function(ex){
            console.log(ex.responseText,"no trae nada");
        }
    });
}

function abrirModal(pos){
    idDetalle=HistorialMascota[pos].idDetalle;
    console.log(idDetalle);
    $("#lbl_responsableM").val(HistorialMascota[pos].perNombre);
    $("#txt_descripcion").val(HistorialMascota[pos].deDescripcion);
}
/**
 * Actualizacion de la Descripcion 
 */
function ActualizarDescripcion(){
    var parametros={
        accion:"ActualizarDesc",
        idDetalle:idDetalle,
        descripcion:$("#txt_descripcion").val()
    };
    console.log(parametros);

    $.ajax({
        url:"../../../controlador/controlHistorialM.php",
        data:parametros,
        type:"post",
        dataType:"json",
        cache:false,

        success: function(resultado){
            if(resultado.estado){
                Swal.fire({
                    title: 'Registrado',
                    text: 'Descripcion Actualizado con Exito..!',
                    icon: 'success',
                    ConfirmButtonText: 'Ok'
                });
                ListarConsultaHistorialM();
            }else{
                Swal.fire({
                    title: 'Oops',
                    text: 'Ha ocurrido un error a la hora de Actualizar la Descripción. Revise',
                    icon: 'Error',
                    ConfirmButtonText: 'Ok'
                });
            }
        },
        error: function(ex){
            console.log(ex.responseText,"no trae nada");
        }
    });
}

function ListarMascotasClienteH(){
    var parametros={
        accion:"ListarMascotasCli",
        idPersona:persona
    }
    console.log(parametros);
    $.ajax({
        url:"../../../controlador/controlHistorialM.php",
        data:parametros,
        type:"post",
        dataType:"json",
        cache:false,

        success: function(resultado){
            console.log(resultado);
            if(resultado.estado){
                var mascotas= resultado.datos;
                console.log(mascotas);
                $.each(mascotas, function(i, mascota){
                    $("#cb_mascota").append("<option value="+ mascota.idMascota +">" 
                    + mascota.masNombre + "</option>");
                });
            }
      },
      error: function(ex){
        console.log(ex.responseText , "no llego nada");
        }
    });
}
