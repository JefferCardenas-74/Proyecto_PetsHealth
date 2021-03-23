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

}

?>