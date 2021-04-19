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
    
    case 'traerProducto':
        
        $resultado = $dProducto->traerProducto($dato);
        echo json_encode($resultado);
        break;

    case 'listarProductos':

        $resultado = $dProducto->listarProductos();
        echo json_encode($resultado);
        break;
    
    case 'agregarProducto':

        $producto = new producto(null, $nombre, $precio, $unidad);

        $resultado = $dProducto->agregarProducto($producto);
        echo json_encode($resultado);
        break;
    
    case 'listarDatosProducto': 

        $resultado = $dProducto->listarDatosProducto($id);
        echo json_encode($resultado);
        break;
}

?>