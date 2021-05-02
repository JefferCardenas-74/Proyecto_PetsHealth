<?php
    class datosFactura{

        private $conexion;
        private $retorno;

        public function __construct(){

            $this->conexion = conexion::singleton();
            $this->retorno = new stdClass()            ;
        }

        function agregarFactura(Factura $factura){

            try{

                $this->conexion->beginTransaction();

                $consulta = 'insert into factura values (null, ?,?,?)';
                $resultado = $this->conexion->prepare($consulta);

                $resultado->bindParam(1, $factura->getEmpleado());
                $resultado->bindParam(2, $factura->getFecha());
                $resultado->bindParam(3, $factura->getTotal());

                $resultado->execute();

                $idFactura = $this->conexion->lastInsertId();

                $consulta = 'insert into facturaproducto values (null, ?,?)';
                $resultado = $this->conexion->prepare($consulta);

                $cantidad = count($factura->getProductos());

                for($j = 0; $j < $cantidad; $j++){

                    $resultado->bindParam(1, $idFactura);
                    $resultado->bindParam(2, $factura->getProductos()[$j]);

                    $resultado->execute();
                }

                $this->conexion->commit();

                $this->retorno->mensaje = 'se agreago la factura correctamente';
                $this->retorno->estado = true;
                $this->retorno->datos = null;
                
            }catch(PDOException $e){

                
                $this->conexion->rollBack();

                $this->retorno->mensaje = $e->getMessage();
                $this->retorno->estado = false;
                $this->retorno->datos = null;

            }

            return $this->retorno;

        }
    }
?>