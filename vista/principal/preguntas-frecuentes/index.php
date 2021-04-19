<?php 


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="../../componente/css/global.css">

    <!--hoja de estilos personalizada-->
    <link rel="stylesheet" href="../../componente/css/preguntasFrecuentes/preguntasFrecuentes.css">

    <!--js externo-->
    <script src="../../js/preguntasFrecuentes/animacion.js"></script>

    <title>Preguntas Frecuentes</title>
</head>
<body>
    <div class="container-fluid">
        <header>
            <h1></h1>
        </header>        

        <!--navbar-->

            <?php include 'menu.php' ?>        

        <!--contenido principal-->
        <section>
            <?php include 'preguntasFrecuentes.php' ?>
        </section>

        <!--pie de pagina-->
            <?php include 'piePagina.php' ?>
    </div>   
</body>
</html>