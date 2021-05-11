<?php
class datosServicio
{

    private $conexion;
    private $retorno;

    public function __construct()
    {
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }

    public function listarServicios()
    {
        try {

            $consulta = "SELECT *  FROM servicio as s  
			inner join tiposervicio as ts on ts.idTipoServicio=s.idTipoServicio";
            $resultado = $this->conexion->query($consulta);   
            $this->retorno->mensaje = 'lista de servicios veterinaria';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();
        } catch (PDOException $e) {
            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }

        return $this->retorno;
    }

}
