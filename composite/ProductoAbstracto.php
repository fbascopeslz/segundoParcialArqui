<?php

abstract class ProductoAbstracto
{
    protected $nombre;
    protected $precio;

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;        
    }

    public function agregarProducto(ProductoAbstracto $producto) 
    {
      
    }
 
    public function eliminarProducto(ProductoAbstracto $producto) 
    {
        
    }

    abstract public function getNombre();
    
    abstract public function setNombre($nombre);

    abstract public function getPrecio();

    abstract public function setPrecio($precio);

}

?>