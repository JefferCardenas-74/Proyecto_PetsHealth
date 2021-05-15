<?php
session_start();
if (!isset($_SESSION["idPersona"])) {
    header("location:../../principal/login/?x=3");
}
else if ($_SESSION["rol"] !== "Administrador"||$_SESSION["estado"] !== 1) {
    // si no corresponde se redrije al login con la variable x=4
    header("location:../../principal/login/?x=4");
}

require_once("../../../configuracion/validaciones.php");

    extract($_REQUEST);

    if(!isset($page)){
        $page = 'frm_registrarEmpleado';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pets Health | Registrar Empleado</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icono del proyecto -->
    <link rel="icon" href="../../../componente/img/petshealth/logoMini.png">
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

    <!--cdn de dataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.css" />

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>

    <!--hoja de estilos global-->
    <link rel="stylesheet" href="../../../componente/css/global.css">

    <!--hoja de estilos personalizada-->
    <link rel="stylesheet" href="../../../componente/css/registrarEmpleado/registrarEmpleado.css">
    <link rel="stylesheet" href="../../../componente/css/menu.css">
    
    <!--libreria sweetalert para alertas personalizadas-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.4/dist/sweetalert2.all.min.js"></script>

    <!-- js global -->
    <script src="../../../js/global.js"></script>
    
    <!--js externo-->
    <script type="module" src="../../../js/registrarEmpleado/registrarEmpleado.js"></script>
    <script src="../../../js/menu.js"></script>
    
</head>

<body>
    <div class="container-fluid">

        <?php include '../menu.php' ?>
        <section><?php include $page.'.php' ?></section>
        <footer><?php include '../../../piePagina.php' ?></footer>

    </div>
</body>

</html>