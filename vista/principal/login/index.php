<?php
require_once("../../../configuracion/validaciones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pets Health | Login</title>
    <!-- icono del proyecto traida de imgur -->
    <link rel="icon" href="https://i.imgur.com/ILKE0xE.png">
        <!--cdn de bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <!--cdn de las fuentes-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Pompiere&display=swap" rel="stylesheet">
    
        <!--cdn de los iconos-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
        <!--cdn de jquery-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <!--hoja de estilos global-->
        <link rel="stylesheet" href="../../../componente/css/global.css">
    
        <!--hoja de estilos personalizada-->
        <link rel="stylesheet" href="../../../componente/css/login/login.css">

        <link rel="stylesheet" href="../../../componente/css/menu.css">

        <link rel="stylesheet" href="../../../componente/iconos/style.css">
    
        <!--js externo-->
        <script src="../../../js/login/login.js"></script>
        <script src="../../../js/menu.js"></script>

        <!-- script de alerta personalizada -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.4/dist/sweetalert2.all.min.js"></script>

        <!-- api google recapthcha -->
        <script src="https://www.google.com/recaptcha/api.js"></script>

    <title>login</title>
</head>
<body>

    <div class="container-fluid">

        <!--menu-->
            <?php include "../../../menu.php"?>

        <!--Seccion principal-->
        <section>
            <?php include "frm_login.php"?>
        </section>
        <!-- Pie pagina -->

        <footer>
            <?php include "../../../piePagina.php"?>
        </footer>

    </div>
    
</body>
</html>