<?php 

class Empleado extends Persona{

    private $idEmpleado;
    private $cargo;
    private $fechaIngreso;

    function __construct($idEmpleado = null,
    Cargo $cargo = null, $fechaIngreso = null, $idPersona = null, $identificacion = null, $nombre = null, $apellido = null, $telefono = null, $correo = null){

        parent::__construct($idPersona, $identificacion, $nombre, $apellido, $telefono, $correo);

        $this->idEmpleado = $idEmpleado;
        $this->cargo = $cargo;
        $this->fechaIngreso = $fechaIngreso;
    
    }

    function getIdEmpleado(){
        return $this->idEmpleado;
    }

    function setIdEmpleado($idEmpleado){
        $this->idEmpleado = $idEmpleado;
    }

    function getCargo(){
        return $this->cargo;
    }

    function setCargo($cargo){
        $this->cargo = $cargo;
    }

    function getFechaIngreso(){
        return $this->fechaIngreso;
    }

    function setFechaIngreso($fechaIngreso){
        $this->fechaIngreso = $fechaIngreso;
    }
}

?>