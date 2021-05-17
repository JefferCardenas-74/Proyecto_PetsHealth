<?php
session_start();
// if (!isset($_SESSION['idPersona'])) {
//     header("location:../../principal/login/?x=3");
// }
// else if ($_SESSION["rol"] !== "Cliente"||$_SESSION["estado"] !== 1) {
//     // si no corresponde se redrije al login con la variable x=4
//     header("location:../../principal/login/?x=4");
// }
require_once("../../../configuracion/validaciones.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetsHealth | Empleado</title>

    <!-- trayendome los stilos del index -->

    <!-- archivo normalize -->
    <link rel="stylesheet" href="../../../componente/css/normalize.css">
    <!-- importar librerias  Boostrap-->
    <!-- Uso de boostrap -->
    <link rel="stylesheet" href="../../../componente/librerias/boostrap5.0beta/css/bootstrap.min.css" />
    <!-- uso de jquery -->
    <script src="../../../componente/librerias/jquery-3.5.1/jquery-3.5.1.min.js"></script>
    <!-- boostrap js -->
    <script src="../../../componente/librerias/boostrap5.0beta/js/bootstrap.min.js"></script>
    <!-- popper b -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- fuente de texto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Pompiere&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../../../componente/css/global.css">
    <!-- js del proyecto -->
    <script src="../../../js/global.js"></script>
    <!-- icono del proyecto -->
    <link rel="icon" href="https://i.imgur.com/ILKE0xE.png">
    <!-- cdn de iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">

    <!-- libreria de alerta personalizada -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.4/dist/sweetalert2.all.min.js"></script>


    <!-- estilos del menu -->
    <link rel="stylesheet" href="../../../componente/css/menu.css">
    <!-- script del menu -->
    <script src="../../../js/menu.js"></script>
    <!-- estilos del css -->
    <link rel="stylesheet" href="../../../componente/css/verEmpleados/verEmpleados.css">
    <!-- script de ver empleados -->
    <script src="../../../js/verEmpleados/verEmpleados.js"></script>
    <!-- libreria datables  para boostrap 5-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <!-- responsive datatables -->
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js" ></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js" > </script>
    <!-- estilos responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <!-- botones datatables -->
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<body>


    <header><?php include "../menu.php" ?></header>
    <section><?php include "frm_verEmpleados.php" ?> </section>
    <footer><?php include "../../../piePagina.php" ?></footer>

</body>
</html>
