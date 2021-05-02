<?php
    class Detalle{
        private $idDetalle;
        private $descripcion;
        private $idCita;

        function __construct($idDetalle = null, $descripcion = null, $idCita = null){
            $this->idDetalle= $idDetalle;
            $this->descripcion= $descripcion;
            $this->idCita = $idCita;
        }

        function getIdDetalle(){
            return $this->idDetalle;
        }

        function setIdDetalle($idDetalle){
            $this->idDetalle = $idDetalle;
        }

        function getDescripcion(){
            return $this->descripcion;
        }

        function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        function getIdCita(){
            return $this->idCita;
        }

        function setIdCita($idCita){
            $this->idCita = $idCita;
        }

    }


?>