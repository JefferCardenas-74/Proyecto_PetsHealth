<?php
extract($_REQUEST);
error_reporting(1);
require_once('rutasMenu.php');

if ($x == 3) {
    // echo "Para ingresar debe iniciar primero la sesión";
    // se ejecut codigo js desde php
    echo '<script type="text/javascript">'
    , 'Swal.fire({
        title: "Advertencia",
        icon: "warning",
        text: "Para ingresar debe iniciar primero la sesión"
    });
         '
    , '</script>'
    ;

}
if ($x == 4) {
    // echo "<p>Estas intentado ingresar a un rol que no tienes acceso</p>";
    // se ejecut codigo js desde php
    echo '<script type="text/javascript">'
    , 'Swal.fire({
        title: "Error",
        icon: "warning",
        html: "No puedes acceder o tu usuario esta <span class=text-danger> Inactivo</span> ",
        footer: "<p class=text-muted >Estas intentado ingresar a un rol que no tienes acceso </p>"


    });
         '
    , '</script>'
    ;

}

if ($x == 5) {
    echo '<script type="text/javascript">'
    , 'const Toast = Swal.mixin({
					toast: true,
					position: "bottom-end",
					showConfirmButton: false,
					timer: 3000,
				  })
				  Toast.fire({
					icon: "info",
					title: "Ha cerrado la session"
				  })',
    // "  ";
    '</script>';
}
