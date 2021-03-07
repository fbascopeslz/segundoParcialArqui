<?php

require_once "Pago.php";

class PagoConTargeta extends Pago
{
    protected function calcularPago() {
        //Descuento del 18%
        $this->pagoConTargeta = $this->precio - ($this->precio * 0.18);
    }

}

?>