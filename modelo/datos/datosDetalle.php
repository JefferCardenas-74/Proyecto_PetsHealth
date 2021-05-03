<?php
    class datosDetalle{

        private $conexion;
        private $retorno;

        function __construct(){
            
            $this->conexion = conexion::singleton();
            $this->retorno = new stdClass();
        }

        function agregarDetalle(Detalle $detalle){
            
            try{
                /**se inicia la transaccion */
                $this->conexion->beginTransaction();
                /**se agrega el detalle a la base de datos */
                $consulta = 'insert into detalle values (null, ?)';
                $resultado = $this->conexion->prepare($consulta);

                $resultado->bindParam(1, $detalle->getDescripcion());

                $resultado->execute();
                /**se obtiene el id del detalle que se acabo de agregar */
                $idDetalle = $this->conexion->lastInsertId();
                $detalle->setIdDetalle($idDetalle);

                /**se agregan los id de cita y detalle a la base de datos para hacer la relacion */
                $consulta = 'insert into citadetalle values (null, ?, ?)';
                $resultado = $this->conexion->prepare($consulta);

                $resultado->bindParam(1, $detalle->getIdCita());
                $resultado->bindParam(2, $detalle->getIdDetalle());

                $resultado->execute();
                
                $this->conexion->commit();

                $this->retorno->mensaje = 'se agrego el detalle con exito';
                $this->retorno->estado = true;
                $this->retorno->datos = $idDetalle;
                
            }catch(PDOException $e){
                
                $this->conexion->rollBack();
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }
    }
?>