<?php

abstract class Pago
{    
    protected $precio;
    protected $pagoEfectivo;
    protected $pagoConTargeta;
    
    public function getPrecio() 
    {
        return $this->precio;
    }

    public function setPrecio($precio) 
    {
        $this->precio = $precio;
    }

    public function getPagoEfectivo() 
    {
        return $this->pagoEfectivo;
    }

    public function setPagoEfectivo($pagoEfectivo) 
    {
        $this->pagoEfectivo = $pagoEfectivo;
    }

    public function getPagoConTargeta() 
    {
        return $this->pagoConTargeta;
    }

    public function setPagoConTargeta($pagoConTargeta) 
    {
        $this->pagoConTargeta = $pagoConTargeta;
    }


    abstract protected function calcularPago();


    public function calcularPagoCompra(){
        $this->calcularPago();
    }
   
}

?>