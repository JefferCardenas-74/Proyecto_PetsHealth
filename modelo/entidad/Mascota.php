<?php 
    class Mascota{

        private $idMascota;
        private $idPersona;
        private $tipoMascota;
        private $nombre;
        private $fechaNacimiento;
        private $edad;

        function __construct($idMascota = null, $idPersona = null, $tipoMascota = null, $nombre = null, $fechaNacimiento = null, $edad = null){
            
            $this->idMascota = $idMascota;
            $this->idPersona = $idPersona;
            $this->tipoMascota = $tipoMascota;
            $this->nombre = $nombre;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->edad = $edad;
        }

        public function getIdMascota() {
            return $this->idMascota;
        }

        public function getIdPersona() {
            return $this->idPersona;
        }

        public function gettipoMascota() {
            return $this->tipoMascota;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getFechaNacimiento() {
            return $this->fechaNacimiento;
        }

        public function getEdad() {
            return $this->edad;
        }

        public function setIdMascota($idMascota) {
            $this->idMascota = $idMascota;
        }

        public function setIdPersona($idPersona) {
            $this->idPersona = $idPersona;
        }

        public function settipoMascota($tipoMascota) {
            $this->tipoMascota = $tipoMascota;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setFechaNacimiento($fechaNacimiento) {
            $this->fechaNacimiento = $fechaNacimiento;
        }

        public function setEdad($edad) {
            $this->edad = $edad;
        }
        
    }
?>