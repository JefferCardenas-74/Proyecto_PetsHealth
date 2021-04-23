<?php
extract($_REQUEST);
include "../modelo/datos/conexion.php";
include "../modelo/datos/datosTipoMascota.php";
include "../modelo/entidad/TipoMascota.php";

error_reporting(0);
$dTipoMascota = new datos_TipoM();

//print_r("va entrar");
switch ($accion) {
    case "ListarTM":
        $resultado= $dTipoMascota->ListarTipoMascota();
        //print_r($resultado);
        echo json_encode($resultado);
    break;
            
}   