<?php 
    class TipoDocumento{
        private $idTipoDocumento;
        private $tipoDocumento;

        function __construct($idTipoDocumento = null, $tipoDocumento = null){
            $this->idTipoDocumento = $idTipoDocumento;
            $this->tipoDocumento = $tipoDocumento;
        }

        function getIdTipoDocumento(){
            return $this->idTipoDocumento;
        }

        function setIdTipoDocumento($idTipoDocumento){
            $this->idTipoDocumento = $idTipoDocumento;
        }

        function getTipoDocumento(){
            return $this->tipoDocumento;
        }
        function setTipoDocumento($tipoDocumento){
            $this->tipoDocumento = $tipoDocumento;
        }
    }
?>