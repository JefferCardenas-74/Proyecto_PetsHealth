<?php
session_start();
// valido si la session esta disponible
if (!isset($_SESSION['idPersona'])) {
    // lo redirije a login con la varible x=3
   header("location:../principal/login/?x=3");
}
else if ($_SESSION["rol"] !== "Administrador"||$_SESSION["estado"] !== 1) {

  // si no corresponde se redrije al login con la variable x=5
   header("location:../principal/login/?x=4");
}

require_once("../../../configuracion/validaciones.php");// llamo archivo que retorna mensajes que validan la URL
?>
  <html lang="es"><!--Indica el idioma del contenido de la pagina -->
        <head>
            <title>Asignar Veterinario</title>
            <meta charset="UTF-8"> <!-- Caracteres especiales-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Responsive, identifica el tamaño del navegador donde ha sido abierto -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"><!--CDN de DataTable -->
            <!--css historial mascota y css global  -->
            <link rel="stylesheet" type="text/css" href="../../../componente/css/asignarVeterinario/asignarVeterinario.css">
            <link rel="stylesheet" type="text/css" href="../../../componente/css/menu.css">
            <link rel="stylesheet" type="text/css" href="../../../componente/css/global.css">
            <!--cdn de jquery-->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

            <!--fuentes de letras -->
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Pompiere&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
            <!--javascript global del menu -->
            <script src="../../../js/menu.js"></script>
            <!--javascript asignarveterinario -->
            <script src="../../../js/asignarvete/asignarvete.js"></script>
             <!-- js del proyecto -->
            <script src="../../../js/global.js"></script>
            <!-- icono del proyecto -->
            <link rel="icon" href="../../../componente/img/petshealth/logoMini.png">
            
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

            <!-- script de alerta personalizada -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.4/dist/sweetalert2.all.min.js"></script>
      </head>

        <body>
            <div class="container-fluid">
                <nav><?php include "../menu.php" ?></nav>
                <section ><?php include "frm_asignarvete.php"?></section>
                <footer > <?php include "../../../piePagina.php"?></footer>
            </div>
        </body>
  </html>