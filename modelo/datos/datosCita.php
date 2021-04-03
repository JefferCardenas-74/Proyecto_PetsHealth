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
                on Cita.idCita = citaservicio.idCita inner join servicio
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

                $consulta = 'select persona.idPersona, perNombre, perApellido, masNombre from persona inner join mascota
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

        function buscarMascota($idPersona){
            try{

                $consulta = 'select idMascota, masNombre from mascota inner join persona
                on persona.idPersona = ?';
                $resultado = $this->conexion->prepare($consulta);
                $resultado->execute(array($idPersona));

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
    }
?>