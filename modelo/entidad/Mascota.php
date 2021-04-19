<?php 
    class Mascota{

        private $idMascota;
        private $idPersona;
        private $idRaza;
        private $nombre;
        private $fechaNacimiento;
        private $edad;

        function __construct($idMascota = null, Persona $idPersona = null, Raza $idRaza = null, $nombre = null, $fechaNacimiento = null, $edad = null){
            
            $this->idMascota = $idMascota;
            $this->idPersona = $idPersona;
            $this->idRaza = $idRaza;
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

        public function getIdRaza() {
            return $this->idRaza;
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

        public function setIdRaza($idRaza) {
            $this->idRaza = $idRaza;
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