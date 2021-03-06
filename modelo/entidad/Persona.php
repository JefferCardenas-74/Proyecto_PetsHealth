<?php 
    class Persona{
        private $idPersona;
        private $identificacion;
        private $nombre;
        private $apellido;
        private $telefono;
        private $correo;

        function __construct($idPersona = null, $identificacion = null, $nombre = null, $apellido = null, $telefono = null, $correo = null){

            $this->idPersona = $idPersona;
            $this->identificacion = $identificacion;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->correo = $correo;
        }

        function getIdPersona(){
            return $this->idPersona;
        }
        
        function setIdPersona($idPersona){
            $this->idPersona = $idPersona;
        }

        function getIdentificacion(){
            return $this->identificacion;
        }
    
        function setIdentificacion($identificacion){
            $this->identificacion = $identificacion;
        }

        function getNombre(){
            return $this->nombre;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        function getApellido(){
            return $this->apellido;
        }

        function setApellido($apellido){
            $this->apellido = $apellido;
        }

        function getTelefono(){
            return $this->telefono;
        }

        function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        function getCorreo(){
            return $this->correo;
        }

        function setCorreo($correo){
            $this->correo = $correo;
        }
    }
?>