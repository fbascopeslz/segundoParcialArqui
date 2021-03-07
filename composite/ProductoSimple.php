<?php

require_once "ProductoAbstracto.php";

class ProductoSimple extends ProductoAbstracto
{

    public function __construct($nombre, $precio) {        
        parent::__construct($nombre, $precio);
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