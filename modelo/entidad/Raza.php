<?php 
    class Raza{

        private $idRaza;
        private $idTipoMascota;
        private $razaTipo;

        function __construct($idRaza = null, TipoMascota $idTipoMascota = null, $razaTipo = null){

            $this->idRaza = $idRaza;
            $this->idTipoMascota = $idTipoMascota;
            $this->razaTipo = $razaTipo;
        }

        function getIdRaza(){
            return $this->idRaza;
        }
        
        function setIdRaza($idRaza){
            $this->idRaza = $idRaza;
        }

        function getIdTipoMascota(){
            return $this->idTipoMascota;
        }
        
        function setIdTipoMascota($idTipoMascota){
            $this->idTipoMascota = $idTipoMascota;
        }

        function getRazaTipo(){
            return $this->razaTipo;
        }
        
        function setRazaTipo($razaTipo){
            $this->razaTipo = $razaTipo;
        }

    }
?>