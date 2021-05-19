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

                $empleado->setIdPersona($idPersona);

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


        public function listarEmpleados($idPersona)
        {
            try{
                $consulta = "SELECT DISTINCT(ce.idEmpleado),  em.* , p.* ,  u.*, ur.*,r.* ,   if(ce.idCitaEmpleado>1, 'si tiene cita' , 'no tiene cita') as resultado 
                from empleado as em
                LEFT JOIN citaempleado as ce  on ce.idEmpleado=em.idEmpleado
                INNER JOIN persona as p on p.idPersona=em.idPersona
                INNER JOIN usuario as u on u.idPersona=p.idPersona
                INNER JOIN usuariorol as ur on ur.idUsuario=u.idUsuario
                INNER JOIN rol as r on r.idRol = ur.idRol
                WHERE p.idPersona != '$idPersona'
                ORDER BY em.empFechaIngreso DESC
                "
                ;
                $resultado = $this->conexion->query($consulta);
                $this->retorno->mensaje = 'lista de empleados registrados en el sistema';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();
            }catch(PDOException $e){
                
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }
            return $this->retorno;
        }

        function inactivarEmpleado($estado,$idEmpleado){
            try{
                $consulta="UPDATE usuariorol as u SET u.usuEstado=? 
                WHERE u.idUsuarioRol=?";
                $resultado=$this->conexion->prepare($consulta);
                $resultado->bindParam(1,$estado);
                $resultado->bindParam(2,$idEmpleado);
                $resultado->execute();
                $this->retorno->estado = true;
                $this->retorno->datos = null;
                $this->retorno->mensaje="empleado inactivado correctamente"; 
            }catch(PDOException $e){
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

        public function listarEmpleadosParaActualizar($idPersona)
        {
            try{
                $consulta = "SELECT *,  DATEDIFF(CURDATE() ,em.empFechaIngreso) as dias_en_empresa 
                FROM persona as p 
                INNER JOIN empleado as em on p.idPersona=em.idPersona
                INNER JOIN usuario as u on u.idPersona=p.idPersona
                INNER JOIN usuariorol as ur on ur.idUsuario = u.idUsuario
                INNER JOIN rol as r on r.idRol=ur.idRol
                WHERE em.idPersona='$idPersona'"
                ;
                $resultado = $this->conexion->query($consulta);
                $this->retorno->mensaje = 'datos del empleado';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchObject();
            }catch(PDOException $e){
                
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }
            return $this->retorno;
        }
        public function actualizarEmpleado(Usuario $usuario)
        {
            try{
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
                $consulta="UPDATE usuariorol SET idRol=?
                WHERE idUsuario=?";
                $resultado=$this->conexion->prepare($consulta);
                $resultado->bindParam(1, $usuario->getListaRol());
                $resultado->bindParam(2, $usuario->getIdUsuario());
                $resultado->execute();
                $consulta = "UPDATE usuario SET usuLogin=?
                WHERE idPersona=?";
                $resultado=$this->conexion->prepare($consulta);
                $resultado->bindParam(1, $usuario->getEmpleado()->getCorreo());
                $resultado->bindParam(2, $usuario->getEmpleado()->getIdPersona());
                $resultado->execute();
                $this->conexion->commit();
                $this->retorno->mensaje = 'empleado actualizado con exito';
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


        function reporteEmpleadosConCitas()
        {
            try{
                $consulta="SELECT   COUNT(ce.idEmpleado) as cantidad ,if(ce.idEmpleado>1, 'si tiene cita' , 'no tiene cita')as resultado
                , p.perNombre from empleado as em
  				LEFT JOIN citaempleado as ce  on ce.idEmpleado=em.idEmpleado
                INNER JOIN persona as p on p.idPersona=em.idPersona
                INNER JOIN usuario as u on u.idPersona=p.idPersona
                INNER JOIN usuariorol as ur on ur.idUsuario=u.idUsuario
                INNER JOIN rol as r on r.idRol = ur.idRol
                WHERE r.rolNombre='empleado'
                GROUP BY em.idEmpleado";
                $resultado=$this->conexion->prepare($consulta);          
                $resultado->execute();  
                $this->retorno->estado=true;
                $this->retorno->mensaje="Cantidad de empleados que tienen citas asignadaas";
                $this->retorno->datos=$resultado;
            }catch(PDOException $ex){
                $this->retorno->estado=false;
                $this->retorno->mensaje=$ex->getMessage();
                $this->retorno->datos=null;
            }
            return $this->retorno;
        }

        function listarVeterinariosAsignar(){
            try{
                $consulta="select persona.perIdentificacion,persona.perNombre,persona.perApellido,persona.perCorreo,empleado.idEmpleado,empleado.idPersona " 
                . " from empleado INNER JOIN persona on persona.idPersona=empleado.idPersona "
                . " INNER JOIN usuario on usuario.idPersona=persona.idPersona "
                . " INNER JOIN usuariorol on usuariorol.idUsuario=usuario.idUsuario "
                . " INNER JOIN rol on rol.idRol = usuariorol.idRol "
                . " WHERE usuariorol.idRol='2' and usuariorol.usuEstado='1'";

                $resultado = $this->conexion->query($consulta);
                $this->retorno->mensaje = "Listado de los empleados";
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