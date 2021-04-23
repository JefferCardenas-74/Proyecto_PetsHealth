<?php

class datos_TipoM{
    private $miConexion;
    private $retorno;

    public function __construct(){
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }



    public function ListarTipoMascota(){
        try {
            $consulta=" select * from tipomascota";
            $resultado= $this->miConexion->query($consulta);
            $this->retorno->datos=$resultado->fetchall();
            $this->retorno->mensaje="Listado de los tipos de mascota";
            $this->retorno->estado=true;
        } catch (PDOException $ex) {
             $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
            $this->retorno->estado=false;
        }
        return $this->retorno;
    }


}

