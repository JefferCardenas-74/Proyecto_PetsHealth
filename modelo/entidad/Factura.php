<?php
    class Factura{

        private $idFactura;
        private $empleado;
        private $fecha;
        private $total;
        private $productos;

        function __construct($idFactura = null, $empleado = null, $fecha = null, $total = null, $productos = null){
            
            $this->idFactura = $idFactura;
            $this->empleado = $empleado;
            $this->fecha = $fecha;
            $this->total = $total;
            $this->productos = $productos;
        }

        function getIdFactura(){
            return $this->idFactura;
        }

        function setIdaFactura($idFactura){
            $this->idFactura = $idFactura;
        }

        function getEmpleado(){
            return $this->empleado;
        }

        function setEmpleado($empleado){
            $this->empleado = $empleado;
        }

        function getFecha(){
            return $this->fecha;
        }

        function setFecha($fecha){
            $this->fecha = $fecha;
        }

        function getTotal(){
            return $this->total;
        }

        function setTotal($total){
            $this->total = $total;
        }

        function getProductos(){
            return $this->productos;
        }

        function setProductos($productos){
            $this->productos = $productos;
        }
    }
?>