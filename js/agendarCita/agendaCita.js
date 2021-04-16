$(function () {

    cargarControles();
    listarCliente();
    listarServicios();

    // eventos secundarios
    let escojerServicios = new bootstrap.Modal(document.getElementById("modalSelServicios"), {
        keyboard: false,
        backdrop: "static",
    });
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
    // boton del modal de servicios
    $("#btnTipoServicios").click(function () {
        if ($('.chkTipoServicio').is(":checked")) {
            escojerServicios.hide();
        } else {
            alert("No has seleccionado ninguno");
        }
    })


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
            }
        },
        width: 'resolve'
        // theme :'bootstrap-5',
        // selectionCssClass :'miClaseX',
        // select2container :'miClaseX'
    });


    var datepickers = [].slice.call(
        document.querySelectorAll("[data-datepicker]")
    );
    var datepickersList = datepickers.map(function (el) {
        return new Datepicker(el, {
            // lenguaje español -> impiortante tener el script de arriba
            language: "es",
            // tipo de botones en este caso de boostrap
            buttonClass: "btn",
            // formato
            format: "yyyy-mm-dd",
            // orientacion
            orientation: "bottom",
            // fecha minima
            minDate: "data-date",
        });
    });

    
}

/**
 * Obtien el check del servicio de la cita
 */
function obtenerServicioCita() {


    $('.chkTipoServicio').on('change', function () {

        if ($(this).is(':checked')) {
            $("input:checkbox:not(:checked)").prop("disabled", true);
            let servicio = $(this).val();
            $("#txt_tipoServicio").val(servicio);
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
    let hora = $("#txt_hora").val();
    let cliente = $('select[name="cb_cliente"] option:selected').text();
    let servicio = $('.chkTipoServicio').is(":checked");

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

    $("#cb_cliente").on('change', function () {
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
        accion: "buscarMascotas"
    };
    $.ajax({
        url: '../../../controlador/citaControl.php',
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if (resultado.estado) {
                let clientes = resultado.datos;
                $.each(clientes, function (i, cliente) {
                    $("#cb_cliente").append(
                        "<option value=" + cliente.idMascota + ">" +
                        cliente.masNombre +
                        "</option>"
                    );
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
        accion: "listarServicios"
    };
    $.ajax({
        url: '../../../controlador/servicioControl.php',
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            if (resultado.estado) {
                console.log(resultado);
                let servicios =resultado.datos;
                
                // let clientes = resultado.datos;
                $.each(servicios, function (i, servicio) {
                    $(".form-check").append(
                    "<input type=checkbox class='form-check chkTipoServicio'"+
                     "value="+servicio.serTipo+">" +
                     "<span id='tipoServicio'>"+servicio.serTipo+"</span>"+
                     "<label class='form-check-label'>"+
                     "<small class='text-muted'><p>"+servicio.serDescripcion+"</p></small>"+
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