<?php
extract($_REQUEST);
    if (!isset($page)){
        $page="contenido";
    }
?> 
    <!DOCTYPE html>
    <html lang="es"><!--Indica el idioma del contenido de la pagina -->
        <head>
            <title>Historial Mascota</title>
            <meta charset="UTF-8"> <!-- Caracteres especiales-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Responsive, identifica el tamaño del navegador donde ha sido abierto -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> <!-- cargar Bootstrap a las hojas de estilo -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"><!--CDN de DataTable -->
            <link rel="stylesheet" type="text/css" href="estilos.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Pompiere&display=swap" rel="stylesheet">
        </head>

        <body>
            <div class="container">
                <header class="menu"><?php include "menu.php" ?></header>
                <section><?php include $page.".php"?></section>
                <footer> <?php include "piePagina.php"?></footer>
            </div>
        </body>
    </html>