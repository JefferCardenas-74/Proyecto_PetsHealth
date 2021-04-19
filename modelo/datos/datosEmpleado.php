<?php 
    class datosEmpleado{

        private $conexion;
        private $retorno;

        function __construct(){

            $this->conexion = conexion::singleton();
            $this->retorno = new stdClass();
        }   

        function registrarEmpleado(Empleado $empleado){

            try{

                $this->conexion->beginTransaction();

                $consulta = "insert into persona values(null,?,?,?,?,?)";
                $resultado = $this->conexion->prepare($consulta);

                $resultado->bindParam(1, $empleado->getIdentificacion());
                $resultado->bindParam(2, $empleado->getNombre());
                $resultado->bindParam(3, $empleado->getApellido());
                $resultado->bindParam(4, $empleado->getTelefono());
                $resultado->bindParam(5, $empleado->getCorreo());

                $resultado->execute();

                //se obtiene el id de la persona que se acaba de agreagar
                $idPersona = $this->conexion->lastInsertId();

                print_r($idPersona);
                $empleado->setIdPersona($idPersona);
                print_r($empleado);

                //se agrega a la tabla empleado
                $consulta = 'insert into empleado values (null,?,?)';
                $resultado = $this->conexion->prepare($consulta);

                $resultado->bindParam(1, $empleado->getIdPersona());
                $resultado->bindParam(2, $empleado->getFechaIngreso());

                $resultado->execute();

                //cerramos la transacion
                $this->conexion->commit();

                $this->retorno->mensaje = 'empleado agregado con exito';
                $this->retorno->estado = true;
                $this->retorno->datos = $idPersona;
                


            }catch(PDOException $e){

                $this->conexion->rollBack();

                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;

            }

            return $this->retorno;

        }

        function listarCargo(){

            try{

                $consulta = 'select * from cargo';

                $resultado = $this->conexion->query($consulta);

                $this->retorno->mensaje = 'lista de cargos';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }catch(PDOException $e){
                
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

        function listarRol(){

            try{

                $consulta = 'select * from rol where idRol != 3';

                $resultado = $this->conexion->query($consulta);

                $this->retorno->mensaje = 'lista de rol';
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