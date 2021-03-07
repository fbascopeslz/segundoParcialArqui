<?php

class OrdenVenta {
    
    public $idOrdenVenta;
    public $cliente;
    public $arrayProductos;


    public function __construct($idOrdenVenta, $cliente)
	{
        $this->idOrdenVenta = $idOrdenVenta;
        $this->cliente = $cliente;
        $this->arrayProductos = new \SplObjectStorage();
	}

    public function getIdOrdenVenta() 
    {
        return $this->idOrdenVenta;
    }
 
    public function setIdOrdenVenta($idOrdenVenta) 
    {
        $this->idOrdenVenta = $idOrdenVenta;
    }
 
    public function getCliente() 
    {
        return $this->cliente;
    }
 
    public function setCliente($cliente) 
    {
        $this->cliente = $cliente;
    }
 
    public function getArrayProductos() 
    {
        return $this->arrayProductos;
    }
 
    public function setArrayProductos($arrayProductos) 
    {
        $this->arrayProductos = $arrayProductos;
    }
 
    public function getPrecio() 
    {
        $precio = 0;
        foreach ($this->arrayProductos as $producto) {
            $precio += $producto->getPrecio();
        }        
        return $precio;
    }


    public function agregarProducto($producto) 
    {
        //$this->arrayProductos[] = $producto;
        $this->arrayProductos->attach($producto);        
    }
 
    public function eliminarProducto($producto) 
    {
        $this->arrayProductos->detach($producto);
    }
 
    public function imprimirOrden() 
    {     
        $s = "";
        $s = $s . "Orden: " . $this->idOrdenVenta . "\nCliente: " . $this->cliente . "\nProductos:\n";
    
        foreach ($this->arrayProductos as $producto) {            
            $s = $s . $producto->getNombre() . "   $ " . $producto->getPrecio() . "\n";
        }
      
       $s = $s . "Total: " . $this->getPrecio() . "\n--------------------------------------------------";

       return $s;      
    }
  
    
}
?>