var primeraFila;
var primeraFilaAsignar;
var idCita;
var correoCliente;
var nombreCliente;
var nombreServicio;
var nombreMascota;
var fechaCita;
var horaCita;

$(function () {
    primeraFila = $("#fila");
    primeraFilaAsignar = $("#filaAsignarVete");

    listarCitas();
    listarVeterinarios();

    $("#btn_asignarVete").click(function () {
        asignarVeterinario();
        listarCitas();
    });

    $("#cbVeterinarios").select2({
        language: {
            noResults: function () {
                return "No existe el empleado :(";
            },
            searching: function () {
                return "Buscando..";
            },
        },
        width: "resolve",
    });
});

function listarCitas() {
    $(".fila").remove();
    $("#tbl_AsignarVete tbody").append(primeraFilaAsignar);

    var parametros = {
        accion: "listarCitasAsignar",
    };

    $.ajax({
        url: "../../../controlador/citaControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,

        success: function (resultado) {
            console.log(resultado);
            $.each(resultado.datos, function (i, cita) {
                $("#VidCita").html(cita.idCita);
                $("#VFechayHora").html(cita.ciFecha);
                $("#VTipoCita").html(cita.serTipo);
                $("#VSolicitante").html(cita.perNombre);
                $("#btn_mostrarModal").attr(
                    "onclick",
                    "abrirModal(" +
                    cita.idCita +
                    "," +
                    JSON.stringify(cita.perCorreo) +
                    "," +
                    JSON.stringify(cita.perNombre) +
                    "," +
                    JSON.stringify(cita.serTipo) +
                    "," +
                    JSON.stringify(cita.ciFecha) +
                    "," +
                    JSON.stringify(cita.masNombre) +
                    "," +
                    JSON.stringify(cita.hoHora + " - " + cita.hoTipo) +
                    ")"
                );
                $("#tbl_AsignarVete tbody").append(
                    primeraFilaAsignar.clone(true).attr("class", "fila")
                );
            });
            $("#tbl_AsignarVete tbody tr").first().remove();
        },
        error: function (ex) {
            console.log(ex.responseText, "no trae nada");
        },
    });
}

function abrirModal(id, correo, nombre, servicio, fecha, mascota, hora) {
    idCita = id;
    correoCliente = correo;
    nombreCliente = nombre;
    nombreServicio = servicio;
    nombreMascota = mascota;
    fechaCita = fecha;
    horaCita = hora;
    listarVeterinarios();
}

function listarVeterinarios() {
    $(".otrafila").remove();
    var parametros = {
        accion: "listarVeterinarios",
    };
    $.ajax({
        url: "../../../controlador/empleadoControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,

        success: function (resultado) {
            console.log(resultado);
            $.each(resultado.datos, function (i, veterinario) {
                $("#cbVeterinarios").append(
                    $("<option>", {
                        value: veterinario.idEmpleado,
                        id: veterinario.perCorreo,
                        text: "CC ( "+veterinario.perIdentificacion+" ) " +veterinario.perNombre + "  " + veterinario.perApellido,
                        class: "otrafila",
                    })
                );
            });
        },
        error: function (ex) {
            console.log(ex.responseText, "no llega nada");
        },
    });
}

function asignarVeterinario() {
    let nombreVeterinario= $("#cbVeterinarios option:selected").text().split(" )",2);
    var parametros = {
        accion: "AsignarVeterinario",
        idCita: idCita,
        idVeterinario: $("#cbVeterinarios").val(),
        correoCliente: correoCliente,
        nombreCliente: nombreCliente,
        nombreMascota: nombreMascota,
        fechaCita: fechaCita,
        nombreServicio: nombreServicio,
        nombreVeterinario: nombreVeterinario[1],
        correoVeterinario: $("#cbVeterinarios option:selected").attr("id"),
        horaCita: horaCita,
    };
    $.ajax({
        url: "../../../controlador/citaControl.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,

        success: function (resultado) {
            console.log(resultado);

            if (resultado.estado) {
                Swal.fire({
                    title: "Asignado Veterinario",
                    text: "Veterinario Asignado con exito..!",
                    icon: "success",
                    footer:
                        "<p class='text-center'  >Se envio correo electronico al cliente y al empleado." +
                        " </p>",
                    ConfirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btnAceptar",
                    },
                });
                listarCitas();
            } else {
                Swal.fire({
                    title: "Oops",
                    text: "Ha ocurrido un error a la hora de asignar el veterinario. Revise",
                    icon: "error",
                    ConfirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btnAceptar",
                    },
                });
            }
        },
        error: function (ex) {
            console.log(ex.responseText, "no llega nada");
        },
    });
}
