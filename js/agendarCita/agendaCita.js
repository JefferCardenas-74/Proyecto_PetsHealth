var fechaEscogida = null;
var datepicker = null;
var servicio = null;
var nombreCliente = "";
var horaFormateada = "";

$(function () {
    cargarControles();
    listarCliente();
    listarServicios();



    // eventos secundarios
    let escojerServicios = new bootstrap.Modal(
        document.getElementById("modalSelServicios"),
        {
            keyboard: false,
            backdrop: "static",
        }
    );
    let verDatos = new bootstrap.Modal(document.getElementById("modalverDatos"));

    // eventos principales
    $("#btnEscojerServicio").click(function () {
        escojerServicios.show();

        obtenerServicioCita();
    });
    $("#btnVerDatos").click(function () {
        verDatos.show();
        mostrarDatosCita();
    });

    $("#btnEnviarCita").click(function () {
        if (
            $("#cb_cliente").val() != 0 &&
            $("#cb_hora").val() != 0 &&
            $("#txt_fecha").val().length > 0
        ) {
            if (servicio != null) {
                agendarCita();
            } else {
                Swal.fire({
                    icon: "warning",
                    text: "Seleccione el servicio por favor",
                });
            }
        } else {
            Swal.fire({
                icon: "warning",
                text: "Campos vacios verificar",
            });
        }
    });

    // boton del modal de servicios
    $("#btnTipoServicios").click(function () {
        if ($(".chkTipoServicio").is(":checked")) {
            escojerServicios.hide();
        } else {
            alert("No has seleccionado ninguno");
        }
    });
});

/**
 * Carga los principales controles
 */
function cargarControles() {
    // establecer el select de cliente y propiedades
    $("#cb_cliente").select2({
        language: {
            noResults: function () {
                return "No hay resultado de tu mascota :(";
            },
            searching: function () {
                return "Buscando..";
            },
        },
        width: "resolve",
        // theme :'bootstrap-5',
        // selectionCssClass :'miClaseX',
        // select2container :'miClaseX'
    });
    // establecer el select de horas
    $("#cb_hora").select2({
        language: {
            noResults: function () {
                return "No hay  horas disponibles :(";
            },
            searching: function () {
                return "Buscando..";
            },
        },
        width: "resolve",
        // theme :'bootstrap-5',
        // selectionCssClass :'miClaseX',
        // select2container :'miClaseX'
    });

    var element = document.getElementById("txt_fecha");
    datepicker = new Datepicker(element, {
        language: "es",
        buttonClass: "btn",
        format: "yyyy-mm-dd",
        // orientacion
        orientation: "bottom",
        // fecha minima
        minDate: "data-date",
    });
    // obtener el cambio de fecha
    element.addEventListener(
        "changeDate",
        function (e) {
            // Esta es la información que recibimos del CustomEvent
            // console.log(" ", e.detail);
            fechaEscogida = datepicker.getDate("yyyy-mm-dd");
            // console.log("cambio");
            $("#cb_hora option").remove();
            listarHorasDisponibles(fechaEscogida); //carga horas disponibles
        },
        false
    );
}

/**
 * LimpiarCampos
 */

function limpiarCampos() {
    $("#txt_fecha").val("");
    $("#cb_cliente option").remove();
    $("#cb_hora option").remove();
    $(".chkTipoServicio").prop("checked", false);
    listarHorasDisponibles(fechaEscogida);
    listarCliente();
    servicio = null;
}
/**
 * Obtien el check del servicio de la cita
 */
function obtenerServicioCita() {
    $(".chkTipoServicio").on("change", function () {
        if ($(this).is(":checked")) {
            $("input:checkbox:not(:checked)").prop("disabled", true);
            servicio = $(this).val();
            $("#txt_tipoServicio").val("Servicio #" + servicio);
        } else {
            $("input:checkbox:not(:checked)").prop("disabled", false);
            //alert("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
        }
    });
}

/**
 * Obtiene los datos del formulario
 * para mostrarlos en la modal ´ver datos´
 */
function mostrarDatosCita() {
    let usuario = $("#txt_nombreUsuario").val();
    let fecha = $("#txt_fecha").val();
    let hora = $('select[name="cb_hora"] option:selected').text();
    let cliente = $('select[name="cb_cliente"] option:selected').text();
    servicio = $(".chkTipoServicio").is(":checked");

    if (cliente !== "") {
        $("#txt_cliente").val(cliente);
    }
    if (hora !== "") {
        $("#hora").val(hora);
    } else {
        $("#hora").val("No ha Seleccionado");
    }
    if (!servicio) {
        $("#txt_tipoServicio").val("No ha Seleccionado");
    }

    $("#cb_cliente").on("change", function () {
        cliente = $('select[name="txtSelCliente"] option:selected').text();
        $("#txt_cliente").val(cliente);
    });

    $("#txt_usuario").val(usuario);
    $("#fecha").val(fecha);
}

/**
 * Lista los cliente en el select
 * Parametros:accion y id de persona
 */
function listarCliente() {
    let parametros = {
        accion: "buscarMascotas",
    };
    $.ajax({
        url: "../../../controlador/citaControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if (resultado.estado) {
                let clientes = resultado.datos;
                console.log(clientes);
                $.each(clientes, function (i, cliente) {
                    $("#cb_cliente").append(
                        "<option value=" +
                        cliente.idMascota +
                        ">" +
                        cliente.masNombre +
                        "</option>"
                    );
                });
                $("#cb_cliente").change(function () {
                    nombreCliente = $("#cb_cliente option:selected").text();
                    console.log(nombreCliente);
                });
            } else {
                alert("No tienes mascotas registradas :c");
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });
}

function listarServicios() {
    let parametros = {
        accion: "listarServicios",
    };
    $.ajax({
        url: "../../../controlador/servicioControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if (resultado.estado) {
                console.log(resultado);
                let servicios = resultado.datos;

                // let clientes = resultado.datos;
                $.each(servicios, function (i, servicio) {
                    $(".form-check").append(
                        "<input type=checkbox class='form-check chkTipoServicio'" +
                        "value=" +
                        servicio.idServicio +
                        ">" +
                        "<span id='tipoServicio'>" +
                        servicio.serTipo +
                        "</span>" +
                        "<label class='form-check-label'>" +
                        "<small class='text-muted'><p>" +
                        servicio.serDescripcion +
                        "</p></small>" +
                        "</label>"
                    );
                });
            } else {
                alert("No hay servicios disponibles :c");
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });
}

function listarHorasDisponibles(fechaEscogida) {
    let parametros = {
        accion: "listarHorasDisponibles",
        fecha: fechaEscogida,
    };
    $.ajax({
        url: "../../../controlador/citaControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            // arregloFechas.push(resultado.datos);
            // xd =arregloFechas.slice(-1,arregloFechas.lenght);
            // console.log(xd[0]);
            // var nuevoArr = arregloFechas.slice(-1,arregloFechas.lenght);
            // console.log(nuevoArr);
            // // console.log(x);
            if (resultado.estado) {

                let horas = resultado.datos;
                // console.log(xd[0]);
                $.each(horas, function (i, hora) {
                    $("#cb_hora").append(
                        "<option value=" +
                        hora.idHora +
                        ">" +
                        hora.hoHora +
                        " " +
                        hora.hoTipo +
                        "</option>"
                    );
                });
            } else {
                alert("No hay horas disponibles:c");
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });
}

function agendarCita() {
    let parametros = {
        accion: "agendarCita",
        cliente: $("#cb_cliente").val(),
        servicio: servicio,
        fecha: fechaEscogida,
        hora: $("#cb_hora").val(),
        horaFormateada: $("#cb_hora option:selected").text(),
        nombreCliente: nombreCliente,
    };

    $.ajax({
        url: "../../../controlador/citaControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        beforeSend: function () {
            $("#btnEnviarCita").text("Procesando...");
            $("#btnEnviarCita").attr("disabled", true);
        },
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                // vuelvo a poner el texto como estaba
                $("#btnEnviarCita").text("Enviar cita");
                $("#btnEnviarCita").attr("disabled", false);
                limpiarCampos();
                Swal.fire({
                    title: "Bien hecho",
                    icon: "success",
                    text: resultado.mensaje,
                    footer: "<a>Revisa tu correo </a>",
                });
            } else {
                Swal.fire({
                    title: "Error",
                    icon: "error",
                    text: resultado.mensaje,
                    footer: "<a>Ocurrio un problema verfica por favor</a>",
                });
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        },
    });
}
