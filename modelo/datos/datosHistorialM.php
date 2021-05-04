<?php
class datos_HistorialM{
    private $miConexion;
    private $retorno;

    public function __construct(){
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }
    /**
     * se consulta con $identificacion de la persona y se 
     * lista todas las mascotas de dicha persona"encargado"
     */

    public function listarMascotas($identificacion){
        try{
            $consulta="select idMascota, masNombre from mascota "
            . " inner join persona on persona.idPersona=mascota.idPersona"
            . " where persona.perIdentificacion = ?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$identificacion);
            $resultado->execute();

            $this->retorno->estado=true;
            $this->retorno->datos=$resultado->fetchAll();
            $this->retorno->mensaje="Listado de Mascotas del encargado";

        }catch(PDOException $ex){
            $this->retorno->estado=false;
            $this->retorno->mensaje=$ex->getMessage();
            $this->retorno->datos=null;
        }

        return $this->retorno;
    }

    /**
     * se consulta la mascota que seleccione $idMascota y se trae los datos respectivos
     */

    public function listarMascota($idMascota){
        try{
            $consulta=" select persona.perNombre, persona.perIdentificacion,masNombre, masEdad "
            . " from mascota inner join persona on mascota.idPersona=persona.idPersona "
            . " where mascota.idMascota = ?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$idMascota);
            $resultado->execute();

            if($resultado->rowCount()>0){
                $this->retorno->estado=true;
                $this->retorno->datos=$resultado->fetchAll(); 
             }else{
                  $this->retorno->estado=false;
                  $this->retorno->datos=null;
             }
             $this->retorno->mensaje="Datos de la Mascota";
        } catch(PDOException $ex){
            $this->retorno->estado=false;
            $this->retorno->mensaje=$ex->getMessage();
            $this->retorno->datos=null;
        }
        return $this->retorno;

    }
    /**
     * con el $idMascota se consulta los datos para la tabla 
     */
    public function listarConsultaM($idMascota){
        try{
            $consulta=" select detalle.idDetalle,cita.ciFecha, detalle.deDescripcion, servicio.serTipo, mascota.masNombre,"
            . " persona.perNombre from cita inner JOIN citadetalle "
            . " on cita.idCita = citadetalle.idCita inner join detalle "
            . " on citadetalle.idDetalle = detalle.idDetalle inner join citaservicio "
            . " on citaservicio.idCita = cita.idCita inner join servicio "
            . " on citaservicio.idServicio = servicio.idServicio inner join mascota "
            . " on mascota.idMascota = cita.idMascota inner join persona "
            . " on mascota.idPersona = persona.idPersona "
            . " where mascota.idMascota = ?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$idMascota);
            $resultado->execute();

            if($resultado->rowCount()>0){
                $this->retorno->estado=true;
                $this->retorno->datos=$resultado->fetchAll(); 
             }else{
                  $this->retorno->estado=false;
                  $this->retorno->datos=null;
             }
             $this->retorno->mensaje="Datos de la Mascota";
        }catch(PDOException $ex){
            $this->retorno->estado=false;
            $this->retorno->mensaje=$ex->getMessage();
            $this->retorno->datos=null;
        }
        return $this->retorno;
    }

    /**
     * Actualizacion de descripcion seleccionada
     */
    public function ActualizarDescripcionM($idMascota, $descripcion){
        try{
            $consulta="update detalle INNER join  citadetalle on citadetalle.idDetalle=detalle.idDetalle"
            . " inner join cita on cita.idCita=citadetalle.idCita set detalle.deDescripcion='$descripcion'" 
            . " where detalle.idDetalle=?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$idMascota);
            $resultado->execute();

            $this->retorno->estado=true;
            $this->retorno->mensaje="se actualizo la descripcion del historial ";
            $this->retorno->datos=null;
        }catch(PDOException $ex){
            $this->retorno->estado=false;
            $this->retorno->mensaje=$ex->getMessage();
            $this->retorno->datos=null;
        }
        return $this->retorno;
    }


    public function listarMascotasCli($idPersona){
        try{
            $consulta="select idMascota, masNombre from mascota "
            . " inner join persona on persona.idPersona=mascota.idPersona"
            . " inner join usuario on usuario.idPersona=persona.idPersona"
            . " inner join usuariorol on usuariorol.idUsuario=usuario.idUsuario"
            . " inner join rol on rol.idRol=usuariorol.idRol"
            . " where usuariorol.idRol='3' and persona.idPersona = ?";

            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$idPersona);

            $resultado->execute();

            $this->retorno->estado=true;
            $this->retorno->datos=$resultado->fetchAll();
            $this->retorno->mensaje="Listado de Mascotas del encargado";

        }catch(PDOException $ex){
            $this->retorno->estado=false;
            $this->retorno->mensaje=$ex->getMessage();
            $this->retorno->datos=null;
        }
        return $this->retorno;
    }
}