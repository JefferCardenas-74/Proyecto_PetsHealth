var primeraFilaEmpleado;
var modalInactivar=null;
var modalActualizar=null;
var idEmpleado=null;
var idPersona=null;
var idUsuario=null;

$(function () {
    primeraFilaEmpleado= $("#fila");
    modalInactivar = new bootstrap.Modal(document.getElementById("modalInactivar"), {
        keyboard: false,
        backdrop: "static",
    });
    modalActualizar = new bootstrap.Modal(document.getElementById("modalActualizar"), {
        keyboard: false,
        backdrop: "static",
    });
    listarEmpleados();

    $("#btn_inactivarEmpleado").click(function () {
        inactivarEmpleado();
    });
    $("#btn_ActualizarEmpleado").click(function () {
        if($("#txt_nroEmpleado").val()!="" &&
        $("#txt_nombreEmpleado").val()!=""&&
        $("#txt_apellidoEmpleado").val()!=""&&
        $("#txt_telefonoEmpleado").val()!=""&&
        $("#txt_correoEmpleado").val()!=""&&
        $("#cb_rolEmpleado").val()>0
              ){
            actualizarEmpleado();
        }else{
            Swal.fire({
                title: 'Oops',
                text: 'Debe validar todos los campos.',
                icon: 'error',
                ConfirmButtonText: 'Ok'
            });
        }
       
    })
    
});

function listarEmpleados(){


    $(".otraFila").remove();
    $("#tblEmpleados tbody").append(primeraFilaEmpleado);
    let parametros = {
        accion:"listarEmpleados"
    };
    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success:function(resultado){
            let empleados=resultado.datos;
            console.log(empleados);

            $.each(empleados, function (i, empleado) { 
                // cambiarColorCita(cita.ciEstado);
                if(empleado.usuEstado===1){
                    $("#icon_activar").hide();
                    $("#icon_inactivar").show();
                }else if(empleado.usuEstado===0){
                    $("#icon_inactivar").hide();
                    $("#icon_activar").show();
                }
                $("#emContador").html(i+1) ;
                $("#emIdentificacion").html(empleado.perIdentificacion);
                $("#emNombresApellidos").html(empleado.perNombre+" "+empleado.perApellido);            
                $("#emFecha").html(empleado.empFechaIngreso);
                $("#emCantidad").html(empleado.resultado);
                $("#emCargo").html(empleado.rolNombre);
                $("#emEstado").html( ( empleado.usuEstado==1) ? ("Activo" ):( "Inactivo") ); 
                $("#btnInactivar").attr("onclick", "abrirModalinactivar(" +empleado.idUsuarioRol +")");
                $("#btnActualizar").attr("onclick", "abrirModalActualizar(" +empleado.idPersona +","+empleado.idUsuario+")");  
                $("#tblEmpleados tbody").append(primeraFilaEmpleado.clone(true).attr("class","otraFila"));
            });
            $("#tblEmpleados tbody tr").first().remove();  

            $("#tblEmpleados").DataTable({
                language: {
                  url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json",
                  responsive: true
                }
            });    
       },
       error: function(ex){
           console.log(ex.responseText);
       } 
    });
}

function abrirModalinactivar(id) {
    // idCita=cita;
    idEmpleado=id;
    // idMascota=mascota;
    modalInactivar.show();
    
}

function inactivarEmpleado() {
    
    let parametros = {
        accion: "inactivarEmpleado",
        estado: $("#cb_estado").val(),
        idEmpleado: idEmpleado
    };

    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if(resultado.estado){
                const ToastSession = Swal.mixin({
                    toast: true,
                    position: "center",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                  });
                  ToastSession.fire({
                    icon: "success",
                    title: "Actualizando empleado...",
                  }).then((result) => {
                    // si ya se acabo el tiempo
                    if (result.dismiss === Swal.DismissReason.timer) {
                        $("#tblEmpleados").DataTable().destroy();
                        listarEmpleados();
                        idEmpleado=null;
                        $("#cb_estado").val(2);
                        modalInactivar.hide();
                    }
                  });
                
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });
}

function abrirModalActualizar(id,idUsu) {
    idPersona=id;
    idUsuario=idUsu;
    modalActualizar.show();
    listarEmpleadosParaActualizar(id); 
}

function listarEmpleadosParaActualizar(id) {
    
    let parametros = {
        accion: "listarEmpleadosParaActualizar",
        idPersona:id
    };

    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if(resultado.estado){
                let datos=resultado.datos;
              $("#txt_nroEmpleado").val(datos.perIdentificacion);
              $("#txt_nombreEmpleado").val(datos.perNombre);
              $("#txt_apellidoEmpleado").val(datos.perApellido);
              $("#txt_telefonoEmpleado").val(datos.perTelefono);
              $("#txt_correoEmpleado").val(datos.perCorreo);
              $("#cb_rolEmpleado").val(datos.idRol);
                
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });
}
// Actualiza datos del empleado

function actualizarEmpleado() {
    
    let parametros = {
        accion: "actualizarEmpleado",
        idPersona:idPersona,
        idUsuario:idUsuario,
        identificacion:$("#txt_nroEmpleado").val(),
        nombre:$("#txt_nombreEmpleado").val(),
        apellido:$("#txt_apellidoEmpleado").val(),
        telefono:$("#txt_telefonoEmpleado").val(),
        correo:$("#txt_correoEmpleado").val(),
        rol:$("#cb_rolEmpleado").val()
    };

    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if(resultado.estado){
                console.log(resultado);
                const ToastSession = Swal.mixin({
                    toast: true,
                    position: "center",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                  });
                  ToastSession.fire({
                    icon: "success",
                    title: "Actualizando empleado...",
                  }).then((result) => {
                    // si ya se acabo el tiempo
                    if (result.dismiss === Swal.DismissReason.timer) {
                        $("#tblEmpleados").DataTable().destroy();
                        listarEmpleados();
                        idPersona=null;
                        idUsuario=null;
                        modalActualizar.hide();
                    }
                  });

            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });
}