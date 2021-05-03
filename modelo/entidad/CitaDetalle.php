<?php 
    class CitaDetalle{

        private $idCitaDetalle;
        private $idCita;
        private $idDetalle;
        
        function __construct($idCitaDetalle = null, $idCita = null, $idDetalle = null){

            $this->idCitaDetalle = $idCitaDetalle;
            $this->idCita = $idCita;
            $this->idDetalle = $idDetalle;
        }

        function getIdCitaDetalle(){
            return $this->idCitaDetalle;
        }

        function setIdCitaDetalle($idCitaDetalle){
            $this->idCitaDetalle = $idCitaDetalle;
        }

        function getIdCita(){
            return $this->idCita;
        }

        function setIdCita($idCita){
            $this->idCita = $idCita;
        }

        function getIdDetalle(){
            return $this->idDetalle;
        }

        function setIdDetalle($idDetalle){
            $this->idDetalle = $idDetalle;
        }
    }
?>