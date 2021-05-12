<?php
class datosServicio
{

    private $conexion;
    private $retorno;

    public function __construct()
    {
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }

    function buscarServicio($dato){


        try {

            $consulta = "select * from servicio where serTipo like ?";
            
            if(!empty($dato)){

                $resultado = $this->conexion->prepare($consulta);
                $resultado->execute(array('%'.$dato.'%'));
    
    
                $this->retorno->mensaje = 'Servicios';
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

    function traerServicio($dato){

        try{

            $consulta = "select * from servicio where serTipo = ?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $dato);
            $resultado->execute();

            $this->retorno->mensaje = 'servicio solicitado';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();
        
            
        }catch(PDOException $e){

            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }

        return $this->retorno;
        
    }

    
    public function listarServicios()
    {
        try {

            $consulta = "select * from servicio";
            $resultado = $this->conexion->query($consulta);

            $this->retorno->mensaje = 'lista de servicios veterinaria';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();

        } catch (PDOException $e) {
            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }

        return $this->retorno;
    }

    function agregarServicio(Servicio $servicio){
        try{
            
            
            $consulta = 'insert into servicio values (null, ?,?,?)';

            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $servicio->getTipo());
            $resultado->bindParam(2, $servicio->getDescripcion());
            $resultado->bindParam(3, $servicio->getPrecio());

            $resultado->execute();

            $this->retorno->mensaje = 'servicio argregado con exito';
            $this->retorno->estado = true;
            $this->retorno->datos = null;

        }catch(PDOException $e){

            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;

        }

        return $this->retorno;
    }


    function listarDatosServicio($id){

        try{
            $consulta = 'select * from servicio where idServicio = ?';

            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);

            $resultado->execute();

            $this->retorno->mensaje = 'datos del servicio';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();

        }catch(PDOException $e){

            
            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }

        return $this->retorno;
    }

    function actualizarDatosServicio(Servicio $servicio, $idServicio){

        try{

           $consulta = "update servicio set serTipo=?, serDescripcion=?, serPrecio=? where idServicio=?";

           $resultado = $this->conexion->prepare($consulta);
           $resultado->bindParam(1, $servicio->getTipo());
           $resultado->bindParam(2, $servicio->getDescripcion());
           $resultado->bindParam(3, $servicio->getPrecio());
           $resultado->bindParam(4, $idServicio);

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

   function eliminarServicio($idServicio){

    try{

        $consulta = 'delete from servicio where idServicio = ?';

        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(1, $idServicio);

        $resultado->execute();

        $this->retorno->mensaje = 'se elimino correctamente';
        $this->retorno->estado = true;
        $this->retorno->datos = null;

    }catch(PDOException $e){

        $this->retorno->mensaje = $e->getMessage();
        $this->retorno->estado = false;
        $this->retorno->datos = null;
    }

    return $this->retorno;
    }

}

?>


