<?php
    class TipoMascota{

        private $idTipoMascota;
        private $tipo;

        function __construct($idTipoMascota = null, $tipo = null){
            
            $this->idTipoMascota = $idTipoMascota;
            $this->tipo = $tipo;
        }

        function getIdTipoMascota(){
            return $this->idTipoMascota;
        }

        function setIdTipoMascota($idTipoMascota){
            $this->idTipoMascota = $idTipoMascota;
        }

        function getTipo(){
            return $this->tipo;
        }

        function setTipo($tipo){
            $this->tipo = $tipo;
        }


    }
?>