<?php
?>
<?php
error_reporting(0);
extract($_REQUEST);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetsHealth | Cita</title>

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
    <!-- css de agendarCita -->
    <link rel="stylesheet" href="../../../componente/css/verCitas/verCita.css">


    <!-- librerias para datePicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>


    <!-- lenguaje español para datapicker -->
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/locales/es.js"></script>

    <!-- libreria para boostrap-select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- estilos del menu -->
    <link rel="stylesheet" href="../../../componente/css/menu.css">
    <!-- script del menu -->
    <script src="../../../js/menu.js"></script>


<body>


    <header><?php include "menu.php" ?></header>
    <section><?php include "contenido.php" ?> </section>
    <footer><?php include "../../../piePagina.php" ?></footer>

</body>
</html>