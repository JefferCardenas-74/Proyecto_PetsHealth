<?php 

    class producto{

        private $idProducto;
        private $proNombre;
        private $proPrecio;
        private $proUnidadMedida;

        function __construct($idProducto=null, $proNombre=null, $proPrecio=null, $proUnidadMedida=null){

            $this->idProducto = $idProducto;
            $this->proNombre = $proNombre;
            $this->proPrecio = $proPrecio;
            $this->proUnidadMedida = $proUnidadMedida;
        }

        function getIdProducto(){
            return $this->idProducto;
        }

        function setIdProducto($idProducto){
            $this->idProducto = $idProducto;
        }

        function getProNombre(){
            return $this->proNombre;
        }

        function setProNombre($proNombre){
            $this->proNombre = $proNombre;
        }

        function getProPrecio(){
            return $this->proPrecio;
        }

        function setProPrecio($proPrecio){
            $this->proPrecio = $proPrecio;
        }

        function getProUnidadMedida(){
            return $this->proUnidadMedida;
        }

        function setProUnidadMedida($proUnidadMedida){
            $this->proUnidadMedida = $proUnidadMedida;
        }
    }
?>