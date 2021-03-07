<?php

require_once "ProductoAbstracto.php";

class ProductoCompuesto extends ProductoAbstracto
{
    //private List< AbstractProduct > products = new ArrayList< AbstractProduct >();
    private $productos;

    public function __construct($nombre) 
    {  
        parent::__construct($nombre, 0);
        $this->productos = new \SplObjectStorage();
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
        $precio = 0;
        foreach ($this->productos as $producto) {
            $precio += $producto->getPrecio();
        }        
        return $precio;
    }

    public function setPrecio($precio) 
    {
        echo "Operacion no soportada";
        //throw new UnsupportedOperationException();
    }

    
    public function agregarProducto($producto) 
    {
        //$this->arrayProductos[] = $producto;
        $this->productos->attach($producto);        
    }
 
    public function eliminarProducto($producto) 
    {
        $this->productos->detach($producto);
    }

}

?>