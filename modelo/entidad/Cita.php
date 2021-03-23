<?php 

class Cita{

    private $idCita;
    private $idMascota;
    private $idEmpleado;
    private $fecha;

    function __construct($idCita = null,Mascota $idMascota = null, Empleado $idEmpleado = null, $fecha = null){

        $this->idCita = $idCita;
        $this->idMascota = $idMascota;
        $this->idEmpleado = $idEmpleado;
        $this->fecha = $fecha;
        
    }

    public function getIdCita() {
        return $this->idCita;
    }

    public function getIdMascota() {
        return $this->idMascota;
    }

    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setIdCita($idCita) {
        $this->idCita = $idCita;
    }

    public function setIdMascota($idMascota) {
        $this->idMascota = $idMascota;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
}

?>