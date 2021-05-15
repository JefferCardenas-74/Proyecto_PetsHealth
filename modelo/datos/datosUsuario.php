<?php
class datosUsuario
{
    private $conexion;
    private $retorno;

    public function __construct()
    {
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Obtiene los datos del empleado al iniciar la sesión
     * se agrupa la cantidad de roles que tiene dicho usuario 
     * dado su login y password
     */
    public function iniciarSesion(Usuario $user)
    {
        try {
            $sql = "SELECT * ,COUNT(ur.idUsuario) as cantidadRoles 
            FROM usuario  as u INNER JOIN persona as p
            on u.idPersona=p.idPersona inner join usuariorol as ur on
              ur.idUsuario=u.idUsuario inner join rol  as r on r.idRol=ur.idRol
              where usuLogin=? and usuPassword=?";

            $resultado = $this->conexion->prepare($sql);
            $resultado->bindParam(1, $user->getLogin());
            $resultado->bindParam(2, $user->getPassword());
            $resultado->execute();
            if ($resultado->rowCount() > 0) {
                $this->retorno->mensaje = "Datos del Usuario";
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchObject();
            } else {
                $this->retorno->mensaje = "Error por favor revisar las credenciales";
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

    /**
     * Obtengo el usuario  mediante el correo
     * para recuperar contraseña
     */
    public function obtenerUsuario($txtUser)
    {
        try {
            $sql = "SELECT  p.perIdentificacion ,p.perCorreo ,
             p.perNombre ,p.perApellido ,u.idUsuario  FROM persona as p
            INNER JOIN usuario as u on u.idPersona=p.idPersona
            WHERE p.perCorreo=?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bindParam(1, $txtUser);
            $resultado->execute();
            if ($resultado->rowCount() > 0) {
                $this->retorno->estado = true;
                $this->retorno->mensaje = "datos del usuario";
            } else {
                $this->retorno->estado = false;
                $this->retorno->mensaje = "No existe usuario con ese correo en nuestro sistema ";
            }
            $this->retorno->datos = $resultado->fetchObject();
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

    // * actualiza la contraseña  del usuario 
    public function actualizarPaswordUsuario($password, $idUsuario)
    {
        try {
            $sql = "UPDATE usuario SET usuPassword=? WHERE idUsuario=?";
            $resultado = $this->conexion->prepare($sql);
            $resultado->bindParam(1, $password);
            $resultado->bindParam(2, $idUsuario);
            $resultado->execute();
            // validar si hubo cambios en las filas   
            if ($resultado->rowCount() > 0) {
                $this->retorno->estado = true;
                $this->retorno->mensaje = "Contraseña del usuario actualizado con exito";
            } else {
                $this->retorno->estado = false;
                $this->retorno->mensaje = "Error al cambiar la Contraseña del usuario";
            }
            $this->retorno->datos = $resultado->fetchObject();
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
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
            $consulta = 'insert into usuariorol values (null,?,?,1)';

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

    public function listarPersona($idPersona)
    {
        try{
            $consulta = "SELECT * FROM persona as p 
            WHERE p.idPersona='$idPersona'"
            ;
            $resultado = $this->conexion->query($consulta);
            $this->retorno->mensaje = 'datos de la persona';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchObject();
        }catch(PDOException $e){
            
            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }


    public function actualizarPersona(Usuario $usuario)
    {
        try {
            $this->conexion->beginTransaction();
            $consulta = "UPDATE persona SET perIdentificacion=?,
            perNombre=?, perApellido=?,perTelefono=?,perCorreo=?
            WHERE idPersona=?";
            $resultado=$this->conexion->prepare($consulta);
            
            $resultado->bindParam(1, $usuario->getEmpleado()->getIdentificacion());
            $resultado->bindParam(2, $usuario->getEmpleado()->getNombre());
            $resultado->bindParam(3, $usuario->getEmpleado()->getApellido());
            $resultado->bindParam(4, $usuario->getEmpleado()->getTelefono());
            $resultado->bindParam(5, $usuario->getEmpleado()->getCorreo());
            $resultado->bindParam(6, $usuario->getEmpleado()->getIdPersona());
            $resultado->execute();

            $consulta = "UPDATE usuario SET usuLogin=?
            WHERE idPersona=?";
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $usuario->getEmpleado()->getCorreo());
            $resultado->bindParam(2, $usuario->getEmpleado()->getIdPersona());
            $resultado->execute();
            $this->conexion->commit();
            $this->retorno->datos = $resultado->fetchObject();
            $this->retorno->mensaje = 'Usuario actualizado con exito';
            $this->retorno->estado = true;
        } catch (PDOException $ex) {
             $this->conexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }
}
