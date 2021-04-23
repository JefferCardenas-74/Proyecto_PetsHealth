<?php 

class datosProducto{

    private $conexion;
    private $retorno;

    function __construct(){

        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }

    function buscarProducto($dato){


        try {

            $consulta = "select * from producto where proNombre like ?";
            
            if(!empty($dato)){

                $resultado = $this->conexion->prepare($consulta);
                $resultado->execute(array('%'.$dato.'%'));
    
    
                $this->retorno->mensaje = 'Productos';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }
            
        } catch (PDOException $ex) {

            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
           
        }

        return $this->retorno;
    }

    function traerProducto($dato){

        try{

            $consulta = "select * from producto where proNombre = ?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $dato);
            $resultado->execute();

            $this->retorno->mensaje = 'producto solicitado';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();
        
            
        }catch(PDOException $e){

            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }

        return $this->retorno;
        
    }

    function listarProductos(){

        try{
            $consulta = 'select * from producto';
            $resultado = $this->conexion->query($consulta);

            $this->retorno->mensaje = 'lista de productos';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();

        }catch(PDOException $e){
            
            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }

        return $this->retorno;
    }

    function agregarProducto(producto $producto){
        try{

            $consulta = 'insert into producto values (null, ?,?,?)';

            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $producto->getProNombre());
            $resultado->bindParam(2, $producto->getProPrecio());
            $resultado->bindParam(3, $producto->getProUnidadMedida());

            $resultado->execute();

            $this->retorno->mensaje = 'producto argregado con exito';
            $this->retorno->estado = true;
            $this->retorno->datos = null;

        }catch(PDOException $e){

            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;

        }

        return $this->retorno;
    }

    function listarDatosProducto($id){

        try{
            $consulta = 'select * from producto where idProducto = ?';

            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);

            $resultado->execute();

            $this->retorno->mensaje = 'datos del producto';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();

        }catch(PDOException $e){

            
            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }

        return $this->retorno;
    }

    function actualizarDatosProducto(producto $producto, $idProducto){

         try{

            $consulta = 'update producto set proNombre=?, proPrecio=?, proUnidadMedida=? where idProducto=?';

            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $producto->getProNombre());
            $resultado->bindParam(2, $producto->getProPrecio());
            $resultado->bindParam(3, $producto->getProUnidadMedida());
            $resultado->bindParam(4, $idProducto);

            $resultado->execute();

            $this->retorno->mensaje = 'datos Actualizados correctamente';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();

         }catch(PDOException $e){

            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
         }

         return $this->retorno;
    }

}

?>