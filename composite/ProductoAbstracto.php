<?php

abstract class ProductoAbstracto
{
    protected $nombre;
    protected $precio;

    public function __construct($nombre, $precio)
    {
        //super();
        $this->nombre = $nombre;
        $this->precio = $precio;        
    }

    public function getNombre() 
    {
        return $this->nombre;
    }

    public function setNombre($nombre) 
    {
        $this->nombre = $nombre;
    }

    public function getPrecio() 
    {
        return $this->precio;
    }

    public function setPrecio($precio) 
    {
        $this->precio = $precio;
    }
}

?>