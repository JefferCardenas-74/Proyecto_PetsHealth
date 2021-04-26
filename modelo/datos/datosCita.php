<?php
    class datosCita{
        
        private $conexion;
        private $retorno;

        function __construct(){
            $this->conexion = conexion::singleton();
            $this->retorno = new stdClass();
        }

        function listarCitas(){
            try{

                $consulta = "select cita.idCita, serTipo, perNombre, masNombre, ciFecha from cita inner JOIN citaservicio
                on cita.idCita = citaservicio.idCita inner join servicio
                on servicio.idServicio = citaservicio.idServicio inner join mascota
                on mascota.idMascota = cita.idMascota inner join persona
                on persona.idPersona = mascota.idPersona";

                $resultado = $this->conexion->query($consulta);

                $this->retorno->estado = true;
                $this->retorno->mensaje = 'citas Asignadas';
                $this->retorno->datos = $resultado->fetchAll();


            }catch(PDOException $e){

                $this->retorno->estado = false;
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->datos = null;

            }

            return $this->retorno;
        }

        function mostrarDatosCita($idCita){
            try{    

                $consulta = 'select cita.idCita, perNombre, serTipo, masNombre from cita inner join citaservicio 
                on cita.idCita = citaservicio.idCita inner join servicio
                on servicio.idServicio = citaservicio.idServicio inner join mascota
                on mascota.idMascota = cita.idMascota inner join persona 
                on persona.idPersona = mascota.idPersona
                where cita.idCita = ?';

                $resultado = $this->conexion->prepare($consulta);
                $resultado->execute(array($idCita));

                $this->retorno->mensaje = 'datos de la Cita';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }catch(PDOException $e){
                
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

        function listarEmpleados(){
            try{

                $consulta = 'select idEmpleado, perNombre, perApellido from empleado inner join persona
                on empleado.idPersona = persona.idPersona';

                $resultado = $this->conexion->query($consulta);

                $this->retorno->mensaje = 'lista de empleados';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }catch(PDOException $e){
                
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

        function buscarCliente($cedula){
            try{    

                $consulta = 'select persona.idPersona, perIdentificacion, perNombre, perApellido, masNombre from persona inner join mascota
                on persona.idPersona = mascota.idPersona
                where perIdentificacion = ?';
                $resultado = $this->conexion->prepare($consulta);
                $resultado->execute(array($cedula));

                $this->retorno->mensaje = 'cliente solicitado';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }catch(PDOException $e){

                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }
            return $this->retorno;
        }

        function buscarMascota($cedula){
            try{

                $consulta = 'select idMascota, masNombre from mascota inner join persona on persona.idPersona = mascota.idPersona where persona.perIdentificacion = ?';
                $resultado = $this->conexion->prepare($consulta);
                $resultado->execute(array($cedula));

                $this->retorno->mensaje = 'mascotas del cliente solicitado';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();


            }catch(PDOException $e){

                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

        function listarTipoCita(){
            try{
                $consulta = 'select * from servicio';
                $resultado = $this->conexion->query($consulta);

                $this->retorno->mensaje = 'tipo de citas';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }catch(PDOException $e){

                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

        function listarHorasDisponibles($fecha){
            try{
                $consulta = 'SELECT DISTINCT(horasdisponible.hoHora) ,horasdisponible.hoTipo 
                ,horasdisponible.idHora
                FROM horasdisponible
                LEFT JOIN cita on horasdisponible.idHora = cita.idHora
                WHERE  cita.idCita is null OR cita.ciFecha  NOT IN (?)
                ORDER by horasdisponible.idHora';
                $resultado = $this->conexion->prepare($consulta);
                $resultado->bindParam(1, $fecha);
                $resultado->execute();
                $this->retorno->mensaje = 'lista de horas disponibles ';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }catch(PDOException $e){

                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }


        function agendarCita(Cita $cita){
            try{
                $this->conexion->beginTransaction(); 
                $consulta="INSERT into cita values(null,?,?,?,?)";
                $resultado=$this->conexion->prepare($consulta);
                $resultado->bindParam(1,$cita->getMascota()->getIdMascota());
                $resultado->bindParam(2,$cita->getFecha());
                $resultado->bindParam(3,$cita->getEstado());
                $resultado->bindParam(4,$cita->getIdHora());
                $resultado->execute();   
                $idCita= $this->conexion->lastInsertId();
                //AGREGA EN CITA SERVICIO
                $cita->setIdCita($idCita);   
                $consulta="INSERT into citaservicio values(null, ?,?)";
                $resultado=$this->conexion->prepare($consulta);
                $resultado->bindParam(1,$idCita);
                $resultado->bindParam(2,$cita->getServicio()->getIdServicio());
                $resultado->execute();
                // ACTUALIZA EL ESTADO A LA MASCOTA
                $consulta ="UPDATE mascota SET masEstado=0 WHERE idMascota=?"; 
                $resultado=$this->conexion->prepare($consulta);
                $resultado->bindParam(1, $cita->getMascota()->getIdMascota()); 
                $resultado->execute();  
                $this->conexion->commit();
                $this->retorno->estado=true;
                $this->retorno->mensaje="cita agendada  correctamente";
                $this->retorno->datos=null;  
            } catch (PDOException $ex) {
                 $this->conexion->rollBack();
                $this->retorno->estado=false;
                $this->retorno->mensaje=$ex->getMessage();
                $this->retorno->datos=null; 
            }
           return $this->retorno;
        }
      

         function verCitasAgendadas($idPersona){
            try{
                $consulta = "SELECT * FROM cita as c INNER join mascota  as m
                on m.idMascota=c.idMascota
                INNER JOIN horasdisponible as hd on hd.idHora=c.idHora 
                INNER JOIN citaservicio  as cs on cs.idCita
                =c.idCita INNER JOIN servicio
                 as s on s.idServicio=cs.idServicio
  					WHERE m.idPersona='$idPersona'";
                $resultado = $this->conexion->query($consulta);
                $this->retorno->mensaje = 'citas agendadas por mi';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }catch(PDOException $e){

                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

        function cancelarCita($idCita,$idMascota){
            try{
                $this->conexion->beginTransaction(); 
                $consulta="UPDATE cita as c SET c.ciEstado='Cancelada' 
                WHERE c.idCita=?";
                $resultado=$this->conexion->prepare($consulta);
                $resultado->bindParam(1,$idCita);
                $resultado->execute();
                 $consulta="UPDATE mascota as m SET m.masEstado=1 
                 WHERE idMascota=?";
                 $resultado=$this->conexion->prepare($consulta);
                 $resultado->bindParam(1,$idMascota);
                 $resultado->execute(); 
                 $this->conexion->commit();
                $this->retorno->estado = true;
                $this->retorno->datos = null;
                $this->retorno->mensaje="cita cancelada  correctamente"; 
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