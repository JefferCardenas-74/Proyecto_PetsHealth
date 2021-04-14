<?php 
    class datosUsuario{

        private $conexion;
        private $retorno;

        function __construct(){

            $this->conexion = conexion::singleton();
            $this->retorno = new stdClass();
        }

        function registrarUsuario(Usuario $usuario){

            try{

                $this->conexion->beginTransaction();

                $consulta = 'insert into usuario values (null, ?,?,?)';

                $resultado = $this->conexion->prepare($consulta);

                $resultado->bindParam(1, $usuario->getIdPersona());
                $resultado->bindParam(2, $usuario->getLogin());
                $resultado->bindParam(3, $usuario->getPassword());

                $resultado->execute();

                /**se obtiene le id del usuario para hacer la relacion con la tabla rol */
                $idUsuario = $this->conexion->lastInsertId();
                $usuario->setIdUsuario($idUsuario);

                /**se obtiene el tamaño del arreglo de roles para saber cuantos insert se van a hacer a la tabla pivote usuarioroles*/
                $tamaño = count($usuario->getListaRol());
                $consulta = 'insert into usuarioroles values (?,?)';

                for($j = 0; $j < $tamaño; $j++){

                    $resultado = $this->conexion->prepare($consulta);
                    $resultado->bindParam(1, $usuario->getIdUsuario());
                    $resultado->bindParam(2, $usuario->getListaRol()[$j]->getIdRol());
                    $resultado->execute();
                }

                $this->conexion->commit();

                $this->retorno->mensaje = 'Usuario agregado con exito';
                $this->retorno->estado = true;
                $this->retorno->datos = null;

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