<?php

class Usuario {

    private $idUsuario;
    private $empleado;
    private $login;
    private $password;
    
    public function __construct($idUsuario=null, Empleado $empleado=null, 
            $login=null, $password=null) {
        $this->idUsuario = $idUsuario;
        $this->empleado = $empleado;
        $this->login = $login;
        $this->password = $password;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getEmpleado() {
        return $this->empleado;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }


    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setEmpleado($empleado) {
        $this->empleado = $empleado;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }



}