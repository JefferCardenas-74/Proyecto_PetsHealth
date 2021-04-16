<?php
include '../modelo/datos/datosServicio.php';
include '../modelo/datos/conexion.php';
include '../modelo/entidad/Servicio.php';

extract($_REQUEST);

error_reporting(0);

$dServicio = new datosServicio();

switch ($accion) {
    case 'listarServicios':
        $resultado = $dServicio->listarServicios();
        echo json_encode($resultado);
        break;

}
