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

}

?>