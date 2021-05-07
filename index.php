<?php
if (!isset($page)) {
    $pagina = "contenido.php";
} else {
    $pagina = $page . ".php";
}
require_once("configuracion/validaciones.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets health</title>
    <!-- archivo normalize -->
    <link rel="stylesheet" href="componente/css/normalize.css">
    <!-- importar librerias  Boostrap-->
    <!-- Uso de boostrap -->
    <link rel="stylesheet" href="componente/librerias/boostrap5.0beta/css/bootstrap.min.css" />
    <!-- uso de jquery -->
    <script src="componente/librerias/jquery-3.5.1/jquery-3.5.1.min.js"></script>
    <!-- boostrap js -->
    <script src="componente/librerias/boostrap5.0beta/js/bootstrap.min.js"></script>
    <!-- popper b -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- fuente de texto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Pompiere&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="componente/css/global.css">
    <!-- estilo del menu -->
    <link rel="stylesheet" href="componente/css/menu.css">
    <!-- js del proyecto -->
    <script src="js/global.js"></script>
    <script src="js/menu.js"></script>
    <!-- icono del proyecto traida de imgur -->
    <link rel="icon" href="https://i.imgur.com/ILKE0xE.png">
    <!-- cdn de iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">

      <!-- libreria de alerta personalizada -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.4/dist/sweetalert2.all.min.js"></script>

</head>

<body>

    <navbar><?php include "menu.php" ?></navbar>
    <header> <?php include "header.php" ?></header>
    <section><?php include $pagina ?> </section>
    <footer><?php include "piePagina.php"?> </footer>

</body>

</html>