<?php 

include '../modelo/datos/conexion.php';
include '../modelo/datos/datosProducto.php';
include '../modelo/entidad/producto.php';

extract($_REQUEST);

error_reporting(0);

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

        $datos = $dProducto->listarDatosProducto($idProducto);
        echo json_encode($datos);
        break;

    case 'actualizarDatosProducto':

         $producto = new producto(null, $nombre, $precio, $unidad);

         $resultado = $dProducto->actualizarDatosProducto($producto, $idProducto);

         echo json_encode($resultado);
         break;

    case 'eliminarProducto':

        $resultado = $dProducto->eliminarProducto($idProducto);

        echo json_encode($resultado);
        
        break;
}

?>