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
            $consulta = "INSERT INTO mascota VALUES(null, ?,?,?,?,?)";
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

}

?>