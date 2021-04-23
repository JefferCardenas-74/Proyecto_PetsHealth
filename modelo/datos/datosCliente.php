<?php 

class datosCliente{

    private $conexion;
    private $retorno;

    function __construct(){

        $this->conexion = conexion::singleton();
        //stdClass: Convierte en un objeto vacio
        $this->retorno = new stdClass();
    }   

    function registrarPersonaCli(Persona $persona){
        try{
            $consulta = "INSERT INTO persona VALUES(null, ?,?,?,?,?)";
            $resultado = $this->conexion->prepare($consulta);

            // $resultado->bindParam(1, $persona->getIdentificacion());
            // $resultado->bindParam(2, $persona->getNombre());
            // $resultado->bindParam(3, $persona->getApellido());
            // $resultado->bindParam(4, $persona->getTelefono());
            // $resultado->bindParam(5, $persona->getCorreo());

            $resultado->execute(array($persona->getIdentificacion(), $persona->getNombre(),$persona->getApellido(),
            $persona->getTelefono(),$persona->getCorreo()));

            $idPersona = $this->conexion->lastInsertId();

            $this->retorno->datos=$idPersona;
            $this->retorno->estado=true;
            $this->retorno->mensaje="Se agrego correctamente la Persona";
    
        }catch(PDOException $e){

            $this->retorno->datos=null;
            $this->retorno->estado=false;
            $this->retorno->mensaje= $e->getMessage();
    
        };
        return $this->retorno;
    }

}


?>

