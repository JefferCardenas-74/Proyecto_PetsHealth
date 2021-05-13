<?php

class Servicio
{

    private $idServicio;
    private $tipo;
    private $descripcion;
    private $precio;

    public function __construct($idServicio = null, $tipo = null, $descripcion=null, $precio=null)
    {

        $this->idServicio = $idServicio;
        $this->tipo = $tipo;
        $this->descripcion= $descripcion;
        $this->precio = $precio;

    }

    /**
     * Get the value of idServicio
     */
    public function getIdServicio()
    {
        return $this->idServicio;
    }

    /**
     * Set the value of idServicio
     */
    public function setIdServicio($idServicio)
    {
        $this->idServicio = $idServicio;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

        /**
     * Get the value of tipo
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of tipo
     */
    public function setDescripcion($descripcion)
    {
        $this->tipo = $descripcion;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio($precio) : self
    {
        $this->precio = $precio;

        return $this;
    }
}