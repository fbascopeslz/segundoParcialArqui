<?php

require_once "OrdenVenta.php";
require_once "ProductoSimple.php";
require_once "ProductoCompuesto.php";

$nit = 7839785;
$cliente = "Fernando Bascope Soliz";
$orden = new OrdenVenta($nit, $cliente);

//for ($i=0; $i < 5; $i++) { 
    
    $producto = new ProductoSimple("Coca Cola 2l", 15);
    $orden->agregarProducto($producto);

    /*
    $producto = new ProductoSimple("1 Cuarto Pollo pierna", 24);
    $orden->agregarProducto($producto);

    $producto = new ProductoSimple("Pollo Economico pecho", 12);
    $orden->agregarProducto($producto);
    */
//}


 $productoCompuesto = new ProductoCompuesto("Combo 1");

 $producto2 = new ProductoSimple("CocaCola 3l", 25);
 $productoCompuesto->agregarProducto($producto2);
 $producto2 = new ProductoSimple("Pollo Economico pecho", 12);
 $productoCompuesto->agregarProducto($producto2);
 
 $orden->agregarProducto($productoCompuesto);


 
 $precioTotal = $orden->getPrecio();
 echo $precioTotal;

 echo $orden->imprimirOrden();



 
?>