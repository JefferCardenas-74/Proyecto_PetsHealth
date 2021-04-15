<?php

    class Usuario{

        private $idUsuario;
        private $idPersona;
        private $login;
        private $password;
        private $listaRol;

        public function __construct($idUsuario = null, $idPersona=null, $login = null, $password=null, $listaRol=null) {

            $this->idUsuario = $idUsuario;
            $this->idPersona = $idPersona;
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

        function getIdPersona(){
        
            return $this->idPersona;
        }

        function setIdPersona($idPersona){

            $this->idPersona = $idPersona;
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
