<?php 

class datosMascota{

    private $conexion;
    private $retorno;

    function __construct(){

        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }   

    function agregarMascota(Mascota $mascota){
        try{
            $consulta = "INSERT INTO mascota VALUES(null, ?,?,?,?,?,1)";
            $resultado = $this->conexion->prepare($consulta);

            $resultado->bindParam(1, $mascota->getIdPersona());
            $resultado->bindParam(2, $mascota->gettipoMascota());
            $resultado->bindParam(3, $mascota->getNombre());
            $resultado->bindParam(4, $mascota->getFechaNacimiento());
            $resultado->bindParam(5, $mascota->getEdad());

            $resultado->execute();

            $this->retorno->datos=null;
            $this->retorno->estado=true;
            $this->retorno->mensaje="Se agrego correctamente la mascota";

        }catch(PDOException $e){

            $this->retorno->datos=null;
            $this->retorno->estado=false;
            $this->retorno->mensaje= $e->getMessage();
    
        };
        return $this->retorno;

    }

    /**
     * Obtiene las mascotas de X cliente
     * sin que tenga una cita agendada anteriormente
     */
    function listarMascotasSinCita($idMascota){
        try{
            $consulta = "SELECT  * from mascota as m
              WHERE m.idMascota='$idMascota' and m.masEstado =0";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idMascota);
            $resultado->execute();
            $this->retorno->mensaje = 'mascotas sin citas agendadas';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();
        }catch(PDOException $e){
            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

    function listarDatosMascota($idMascota){

        try{
            $consulta = 'select masNombre, masFechaNacimiento, idTipoMascota from mascota 
            where idMascota = ?';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idMascota);
            $resultado->execute();
            
            $this->retorno->mensaje = 'datos de la mascota';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();
            
        }catch(PDOException $e){

            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

    function actualizarDatosMascota(Mascota $mascota){

        try{
            $consulta = 'update mascota set masNombre = ?, idTipoMascota = ?, masFechaNacimiento = ?, masEdad = ?
            where idMascota = ?';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $mascota->getNombre());
            $resultado->bindParam(2, $mascota->gettipoMascota());
            $resultado->bindParam(3, $mascota->getFechaNacimiento());
            $resultado->bindParam(4, $mascota->getEdad());
            $resultado->bindParam(5, $mascota->getIdMascota());

            $resultado->execute();

            $this->retorno->mensaje = 'se actualizo con exito';
            $this->retorno->estado = true;
            $this->retorno->datos = null;
            
        }catch(PDOException $e){

            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;

        }

        return $this->retorno;
    }

    function eliminarMascota($idMascota){

        try{
            $consulta = 'delete from mascota where idMascota = ?';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idMascota);
            $resultado->execute();

            $this->retorno->mensaje = 'se elimino la mascota con exito';
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