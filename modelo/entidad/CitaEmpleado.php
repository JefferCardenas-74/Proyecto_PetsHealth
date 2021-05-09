<?php

class CitaEmpleado{

    private $idCitaEmpleado;
    private $idCita;
    private $idEmpleado;
    
    function __construct($idCitaEmpleado = null, $idCita = null,$idEmpleado = null){

        $this->idCitaEmpleado = $idCitaEmpleado;
        $this->idCita = $idCita;
        $this->idEmpleado = $idEmpleado;
    }

    function getIdCitaEmpleado(){
        return $this->idCitaEmpleado;
    }

    function setIdCitaEmpleado($idCitaEmpleado){
        $this->idCitaEmpleado = $idCitaEmpleado;
    }

    function getIdCita(){
        return $this->idCita;
    }

    function setIdCita($idCita){
        $this->idCita = $idCita;
    }

    function getIdEmpleado(){
        return $this->idEmpleado;
    }

    function setIdEmpleado($idEmpleado){
        $this->idEmpleado = $idEmpleado;
    }
}

?>