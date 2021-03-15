<?php 

include '../modelo/datos/datosProducto.php';
include '../modelo/datos/conexion.php';
include '../modelo/entidad/producto.php';

extract($_REQUEST);

error_reporting(1);

$dProducto = new datosProducto();

switch($accion){
    
    case 'buscarProducto':

        $resultado = $dProducto->buscarProducto($busqueda);


        echo json_encode($resultado);      

        break;
}

?>