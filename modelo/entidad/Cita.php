<?php 

class Cita{

    private $idCita;
    private $mascota;
    private $idEmpleado;
    private $fecha;
    private $estado;
    private $idHora;
    private $servicio;

    function __construct($idCita = null,
        Mascota $mascota = null, 
        $idEmpleado = null,
        $fecha = null
        ,$estado =null,
        $idHora=null,
        Servicio $servicio=null
        ){

        $this->idCita = $idCita;
        $this->mascota = $mascota;
        $this->idEmpleado = $idEmpleado;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->idHora= $idHora;
        $this->servicio=$servicio;

        
    }

    public function getIdCita() {
        return $this->idCita;
    }

    public function getIdMascota() {
        return $this->mascota;
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

    public function setIdMascota($mascota) {
        $this->mascota = $mascota;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado) : self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of idHora
     */
    public function getIdHora()
    {
        return $this->idHora;
    }

    /**
     * Set the value of idHora
     */
    public function setIdHora($idHora) : self
    {
        $this->idHora = $idHora;

        return $this;
    }


    /**
     * Get the value of servicio
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Set the value of servicio
     */
    public function setServicio($servicio) : self
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get the value of mascota
     */
    public function getMascota()
    {
        return $this->mascota;
    }

    /**
     * Set the value of mascota
     */
    public function setMascota($mascota) : self
    {
        $this->mascota = $mascota;

        return $this;
    }
}

?>