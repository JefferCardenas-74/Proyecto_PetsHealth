<?php

include '../modelo/datos/conexion.php';
include '../modelo/datos/datosServicio.php';
include '../modelo/entidad/Servicio.php';

extract($_REQUEST);

error_reporting(0);

$dServicio = new datosServicio();

switch ($accion) {

    case 'buscarServicio':

        $resultado = $dServicio->buscarServicio($busqueda);
        echo json_encode($resultado);      
        break;
    
    case 'traerServicio':
        
        $resultado = $dServicio->traerServicio($dato);
        echo json_encode($resultado);
        break;

    case 'listarServicios':
        $resultado = $dServicio->listarServicios();
        echo json_encode($resultado);
        break;

    case 'agregarServicio':   
        
        $servicio = new Servicio(null, $tipo, $descripcion, $precio);
        
        
        $resultado = $dServicio->agregarServicio($servicio);

        echo json_encode($resultado);
        break;
    
    case 'listarDatosServicio': 

        $datos = $dServicio->listarDatosServicio($idServicio);
        echo json_encode($datos);
        break;

    case 'actualizarDatosServicio':

            $servicio = new Servicio(null, $tipo, $descripcion, $precio);

            $resultado = $dServicio->actualizarDatosServicio($servicio, $idServicio);

            echo json_encode($resultado);
            break;

    case 'eliminarServicio':

        $resultado = $dServicio->eliminarServicio($idServicio);

        echo json_encode($resultado);
        
        break;

}
