<?php
    class datosCita{
        
        private $conexion;
        private $retorno;

        function __construct(){
            $this->conexion = conexion::singleton();
            $this->retorno = new stdClass();
        }

        function listarCitasAsignadas($idEmpleado){
            try{

                $consulta = "select empleado.idEmpleado, cita.idCita, perNombre, masNombre, serTipo, ciFecha from cita inner join citaempleado
                on cita.idCita = citaempleado.idCita inner join empleado 
                on empleado.idEmpleado = citaempleado.idEmpleado inner join mascota
                on mascota.idMascota = cita.idMascota inner join persona
                on persona.idPersona = mascota.idPersona inner join citaservicio
                on citaservicio.idCita = cita.idCita inner join servicio
                on servicio.idServicio = citaservicio.idServicio
                where empleado.idEmpleado = ? and cita.ciEstado = 'Solicitada'";

                $resultado = $this->conexion->prepare($consulta);
                $resultado->bindParam(1, $idEmpleado);
                $resultado->execute();

                $this->retorno->estado = true;
                $this->retorno->mensaje = 'citas Asignadas a empleado';
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

                $consulta = 'select cita.idCita, perNombre, servicio.idServicio ,serTipo, serPrecio, mascota.idMascota, masNombre from cita inner join citaservicio 
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
                ,horasdisponible.idHora ,cita.ciFecha
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
                $resultado->bindParam(1,$cita->getIdCita());
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
  					WHERE m.idPersona='$idPersona' ORDER BY c.ciFecha DESC";
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

        function obtenerEmpleado($idPersona){
            
            try{
                $consulta = 'select idEmpleado from empleado inner join persona
                on persona.idPersona = empleado.idPersona
                where persona.idPersona = ?';

                $resultado = $this->conexion->prepare($consulta);
                $resultado->bindParam(1, $idPersona);
                $resultado->execute();

                $this->retorno->mensaje = 'empleado solicitado';
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchAll();

            }catch(PDOException $e){

                
                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

        function actualizarEstado($idCita){

            try{    

                $consulta = 'update cita set ciEstado ="Atendida" where idCita = ?';
                $resultado = $this->conexion->prepare($consulta);

                $resultado->bindParam(1, $idCita);

                $resultado->execute();

                $this->retorno->mensaje = 'se actualizo correctamente';
                $this->retorno->estado = true;
                $this->retorno->datos = null;

            }catch(PDOException $e){

                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }

            return $this->retorno;
        }

          /**
         * se hace una consulta para concer la cantidad de citas
         * por el mes que se hizo
         */
        function reporteCitaPorMes()
        {
            try{
                $consulta="SELECT count(idCita) as cantidad, month(ciFecha) as mes
                FROM cita  group by month(ciFecha) ";
                $resultado=$this->conexion->prepare($consulta);          
                $resultado->execute();  
                $this->retorno->estado=true;
                $this->retorno->mensaje="Cantidad de citas por mes ";
                $this->retorno->datos=$resultado;
            }catch(PDOException $ex){
                $this->retorno->estado=false;
                $this->retorno->mensaje=$ex->getMessage();
                $this->retorno->datos=null;
            }
            return $this->retorno;
        }

        function listarCitasAsignadasVete(){
            try{

                $consulta = "select cita.idCita,cita.ciFecha,servicio.serTipo,persona.perNombre from cita 
                inner join citaservicio on cita.idCita=citaservicio.idCita
                inner join servicio on servicio.idServicio=citaservicio.idServicio
                inner join mascota on mascota.idMascota=cita.idMascota
                inner join persona on persona.idPersona=mascota.idPersona
                where cita.ciEstado='Solicitada'";

                $resultado = $this->conexion->query($consulta);
                $resultado->execute();

                $this->retorno->estado = true;
                $this->retorno->mensaje = 'listado de citas por asignar';
                $this->retorno->datos = $resultado->fetchAll();


            }catch(PDOException $ex){

                $this->retorno->estado = false;
                $this->retorno->mensaje = $ex->getMessage();
                $this->retorno->datos = null;

            }

            return $this->retorno;
        }

        function asignarVeterinario(CitaEmpleado $citaEmpleado){
            try{
                $this->conexion->beginTransaction();

                $consulta= " insert into citaempleado values (null,?,?)";
                $resultado=$this->conexion->prepare($consulta);

                $resultado->bindParam(1,$citaEmpleado->getIdCita());
                $resultado->bindParam(2,$citaEmpleado->getIdEmpleado());
                $resultado->execute();

                $consulta = "update cita set ciEstado ='Asignada' where cita.idCita = ?";
                $resultado = $this->conexion->prepare($consulta);
                $resultado->bindParam(1,$citaEmpleado->getIdCita());
                $resultado->execute();
                $this->conexion->commit();

                $this->retorno->estado=true;
                $this->retorno->mensaje="Cita asignada correctamente";
                $this->retorno->datos=null;
                

            }catch(PDOException $ex){
                $this->retorno->estado=false;
                $this->retorno->mensaje=$ex->getMessage();
                $this->retorno->datos=null;
            }
            return $this->retorno;
        }
}
?>