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

            $consulta = "SELECT *  FROM servicio ";
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

      /**
         * se hace una consulta para concer la cantidad de citas
         * por el mes que se hizo
         */
        function reporteCantidadServicios($fecha)
        {
            try{
                $consulta="SELECT COUNT(cs.idServicio) as cantidad ,
                s.serTipo as tipo   , sum(s.serPrecio) as total 
                FROM  citaservicio as cs 
                INNER JOIN servicio as s on s.idServicio=cs.idServicio 
                INNER JOIN  cita as c on c.idCita=cs.idCita
                WHERE c.ciEstado= 'Atendida' AND MONTH(c.ciFecha)=MONTH('$fecha') AND YEAR(c.ciFecha)=YEAR('$fecha')
                GROUP by cs.idServicio";
                $resultado=$this->conexion->prepare($consulta);          
                $resultado->execute();  
                $this->retorno->estado=true;
                $this->retorno->mensaje="Cantidad tipos de servicos";
                $this->retorno->datos=$resultado;
            }catch(PDOException $ex){
                $this->retorno->estado=false;
                $this->retorno->mensaje=$ex->getMessage();
                $this->retorno->datos=null;
            }
            return $this->retorno;
        }

        

}
