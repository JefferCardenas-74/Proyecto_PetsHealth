<?php

    class Usuario extends Persona{

        private $idUsuario;
        private $login;
        private $password;
        private $listaRol;

        public function __construct($idUsuario=null, $login = null, $password=null, $listaRol=null, $idPersona = null, $nombre = null, $apellido = null, $telefono = null, $correo = null) {

            parent::__construct($idPersona, $nombre, $apellido, $telefono, $correo);

            $this->idUsuario = $idUsuario;
            $this->login = $login;
            $this->password = $password;
            $this->listaRol = $listaRol;               
        }

        function getIdUsuario(){
        
            return $this->idUsuario;
        }

        function setIdUsuario($idUsuario){

            $this->idUsuario = $idUsuario;
        }

        function getLogin(){
        
            return $this->login;
        }

        function setLogin($login){

            $this->login = $login;
        }

        function getPassword(){
        
            return $this->password;
        }

        function setPassword($password){
            
            $this->password = $password;
        }

        function getListaRol(){
            return $this->listaRol;
        }

        function setListaRol($listaRol){
            $this->listaRol = $listaRol;
        }
    }

?>