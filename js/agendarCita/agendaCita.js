$(function() {
    let myModal = new bootstrap.Modal(document.getElementById("modalVerMas"), {
        keyboard: false,
        backdrop: "static",
    });
    let myModal2 = new bootstrap.Modal(document.getElementById("modalverDatos"));

    // establecer el select de cliente y propiedades
    $("#selCliente").select2({
        language: {
            noResults: function() {
                return "No hay resultado de tu mascota :(";
            },
            searching: function() {
                return "Buscando..";
            }
        },
        width: 'resolve'
        // theme :'bootstrap-5',
        // selectionCssClass :'miClaseX',
        // select2container :'miClaseX'

    });





    $("#btnVerMas").click(function() {
        myModal.show();
    });

    $("#btnVerDatos").click(function() {
        myModal2.show();
    });
});

var datepickers = [].slice.call(
    document.querySelectorAll("[data-datepicker]")
);
var datepickersList = datepickers.map(function(el) {
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