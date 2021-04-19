<?php
    class Detalle{
        private $idDetalle;
        private $descripcion;
        private $valor;

        function __construct($idDetalle = null, $descripcion = null, $valor = null){
            $this->idDetalle= $idDetalle;
            $this->descripcion= $descripcion;
            $this->valor= $valor;
        }

        function getIdDetalle(){
            return $this->idDetalle;
        }

        function setIdDetalle($idDetalle){
            $this->idDetalle = $idDetalle;
        }

        function getDescripcion(){
            return $this->descripcion;
        }

        function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        function getValor(){
            return $this->valor;
        }

        function setNombre($valor){
            $this->valor = $valor;
        }

    }


?>