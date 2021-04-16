<?php 

    class Rol{
        
        private $idRol;
        private $rol;

        function __construct($idRol = null, $rol = null){

            $this->idRol = $idRol;
            $this->rol = $rol;
        }

        function getIdRol(){
            return $this->idRol;
        }

        function setIdRol($idRol){
            $this->idRol = $idRol;
        }

        function getRol(){
            return $this->rol;
        }

        function setRol($rol){
            $this->rol = $rol;
        }
    }
?>