var primeraFilaEmpleado;
var modalInactivar = null;
var modalActualizar = null;
var idEmpleado = null;
var idPersona = null;
var idUsuario = null;

$(function () {
    primeraFilaEmpleado = $("#fila");
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
        if ($("#txt_nroEmpleado").val() != "" &&
            $("#txt_nombreEmpleado").val() != "" &&
            $("#txt_apellidoEmpleado").val() != "" &&
            $("#txt_telefonoEmpleado").val() != "" &&
            $("#txt_correoEmpleado").val() != "" &&
            $("#cb_rolEmpleado").val() > 0
        ) {
            actualizarEmpleado();
        } else {
            Swal.fire({
                title: 'Oops',
                text: 'Debe validar todos los campos.',
                icon: 'error',
                ConfirmButtonText: 'Ok'
            });
        }

    })

});

function listarEmpleados() {


    $(".otraFila").remove();
    $("#tblEmpleados tbody").append(primeraFilaEmpleado);
    let parametros = {
        accion: "listarEmpleados"
    };
    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            let empleados = resultado.datos;
            console.log(empleados);

            $.each(empleados, function (i, empleado) {
                // cambiarColorCita(cita.ciEstado);
                if (empleado.usuEstado === 1) {
                    $("#icon_activar").hide();
                    $("#icon_inactivar").show();
                } else if (empleado.usuEstado === 0) {
                    $("#icon_inactivar").hide();
                    $("#icon_activar").show();
                }
                $("#emContador").html(i + 1);
                $("#emIdentificacion").html(empleado.perIdentificacion);
                $("#emNombresApellidos").html(empleado.perNombre + " " + empleado.perApellido);
                $("#emFecha").html(empleado.empFechaIngreso);
                $("#emCantidad").html(empleado.resultado);
                $("#emCargo").html(empleado.rolNombre);
                $("#emEstado").html((empleado.usuEstado == 1) ? ("Activo") : ("Inactivo"));
                $("#btnInactivar").attr("onclick", "abrirModalinactivar(" + empleado.idUsuarioRol + ")");
                $("#btnActualizar").attr("onclick", "abrirModalActualizar(" + empleado.idPersona + "," + empleado.idUsuario + ")");
                $("#tblEmpleados tbody").append(primeraFilaEmpleado.clone(true).attr("class", "otraFila"));
            });
            $("#tblEmpleados tbody tr").first().remove();
            botonesDatatables();
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}

function abrirModalinactivar(id) {
    // idCita=cita;
    idEmpleado = id;
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
            if (resultado.estado) {
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
                        idEmpleado = null;
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

function abrirModalActualizar(id, idUsu) {
    idPersona = id;
    idUsuario = idUsu;
    modalActualizar.show();
    listarEmpleadosParaActualizar(id);
}

function listarEmpleadosParaActualizar(id) {

    let parametros = {
        accion: "listarEmpleadosParaActualizar",
        idPersona: id
    };

    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if (resultado.estado) {
                let datos = resultado.datos;
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
        idPersona: idPersona,
        idUsuario: idUsuario,
        identificacion: $("#txt_nroEmpleado").val(),
        nombre: $("#txt_nombreEmpleado").val(),
        apellido: $("#txt_apellidoEmpleado").val(),
        telefono: $("#txt_telefonoEmpleado").val(),
        correo: $("#txt_correoEmpleado").val(),
        rol: $("#cb_rolEmpleado").val()
    };

    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if (resultado.estado) {
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
                        idPersona = null;
                        idUsuario = null;
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

// Botones Datables para  importar en formatos excel. pdf, csv etc.
const botonesDatatables = () => {

    $("#tblEmpleados").DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json",
            // cambiar el texto del boton de copiar
            buttons: {
                copyTitle: "Datos copiados",
                copySuccess: {
                    _: "%d Registros copiados al portapapeles",
                },
            },
        },
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        // decir que botones mostrar en posicion el dom (Blfrtip)
        // fBrtlp       dom: 'Bfrtip', Se configura manualmente
        dom: '<"row"<"col-sm-12 col-md-4"l><"text-center col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        //  configurar la cantidad de filas que mostrara  la tabla
        lengthMenu: [[5, 25, 50, -1],
        ['5 Filas ', '25 Filas', '50 Filas ', ' Mostrar todo ']],
        // arreglo con los botones y su personalizacion
        buttons:
            [
                {
                    extend: "copy",
                    text: '<i class="fas fa-copy"></i>',
                    titleAttr: "copiar",
                    className: "btn btn-warning",
                },
                ,
                {
                    extend: "excelHtml5",
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: "Exportar a excel",
                    className: "btn btn-success",
                },
                {
                    extend: "print",
                    text: '<i class="fas fa-print"></i>',
                    titleAttr: "Imprimir",
                    className: "btn btn-primary",
                },
                {
                    text: '<i class="fas fa-file-pdf"></i>',
                    extend: "pdfHtml5",
                    title: "Datos de los empleados",
                    titleAttr: "Exportar a pdf",
                    className: "btn btn-danger",
                },
                {
                    extend: "csvHtml5",
                    text: '<i class="fas fa-file-csv"></i>',
                    titleAttr: "Exportar a CSV",
                    className: "btn btn-info",
                }
            ]
    });
}