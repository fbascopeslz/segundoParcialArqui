<?php

require_once "Pago.php";

class PagoEfectivo extends Pago
{
    protected function calcularPago() {
        //Descuento del 5%
        $this->pagoEfectivo = $this->precio - ($this->precio * 0.05);
    }

}

?>