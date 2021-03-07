<?php

//require_once "Pago.php";
require_once "PagoEfectivo.php";
require_once "PagoConTargeta.php";

$pagoEfectivo = new PagoEfectivo();
$pagoEfectivo->setPrecio(52);
$pagoEfectivo->calcularPagoCompra();

echo $pagoEfectivo->getPagoEfectivo();

?>