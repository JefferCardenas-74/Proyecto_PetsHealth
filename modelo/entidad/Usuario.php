<?php

    class Usuario{

        private $idUsuario;
        private $idPersona;
        private $login;
        private $password;
        private $listaRol;
        private $empleado;
        private $idRol;

        public function __construct($idUsuario = null, $idPersona=null,
         $login = null, $password=null, $listaRol=null, Empleado $empleado=null) {

            $this->idUsuario = $idUsuario;
            $this->idPersona = $idPersona;
            $this->login = $login;
            $this->password = $password;
            $this->listaRol = $listaRol;     
            $this->empleado = $empleado;           
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

        /**
         * Get the value of empleado
         */
        public function getEmpleado()
        {
                return $this->empleado;
        }

        /**
         * Set the value of empleado
         */
        public function setEmpleado($empleado) : self
        {
                $this->empleado = $empleado;

                return $this;
        }
    }

?>
