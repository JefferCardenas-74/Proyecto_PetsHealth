<?php

    extract($_REQUEST);

    switch($page){

        case 'frm_citasAsignadas':
            $titulo = 'Citas Asignadas';
            break;

        case 'frm_citasNoProgramadas':
            $titulo = 'Cita No Programada';
            break;
    }
?>

<div class="contenedorTitulo">
    <h1 class="titulo fredoka"><?php echo $titulo ?></h1>
</div>
