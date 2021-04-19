<?php 

class Empleado extends Persona{

    private $idEmpleado;
    private $idCargo;
    private $fechaIngreso;

    function __construct($idEmpleado = null,
    Cargo $idCargo = null, $fechaIngreso = null, $idPersona = null, TipoDocumento $idTipoDocumento = null, $identificacion = null, $nombre = null, $apellido = null, $telefono = null, $correo = null){

        parent::__construct($idPersona, $idTipoDocumento, $identificacion, $nombre, $apellido, $telefono, $correo);

        $this->idEmpleado = $idEmpleado;
        $this->idCargo = $idCargo;
        $this->fechaIngreso = $fechaIngreso;
    
    }

    function getIdEmpleado(){
        return $this->idEmpleado;
    }

    function setIdEmpleado($idEmpleado){
        $this->idEmpleado = $idEmpleado;
    }

    function getIdCargo(){
        return $this->idCargo;
    }

    function setIdCargo($idCargo){
        $this->idCargo = $idCargo;
    }

    function getFechaIngreso(){
        return $this->fechaIngreso;
    }

    function setFechaIngreso($fechaIngreso){
        $this->fechaIngreso = $fechaIngreso;
    }
}

?>