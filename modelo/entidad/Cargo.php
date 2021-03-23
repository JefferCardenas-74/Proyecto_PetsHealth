<?php
    class Cargo{

        private $idCargo;
        private $nombre;

        function __construct($idCargo = null, $nombre = null){
            $this->idCargo = $idCargo;
            $this->nombre = $nombre;
        }

        function getIdCargo(){
            return $this->idCargo;
        }

        function setIdCargo($idCargo){
            $this->idCargo = $idCargo;
        }

        function getNombre(){
            return $this->nombre;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }
    }
?>