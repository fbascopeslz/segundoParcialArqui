<?php
require_once "../composite/OrdenVenta.php";
require_once "../composite/ProductoSimple.php";
require_once "../composite/ProductoCompuesto.php";

require_once "../plantilla/PagoEfectivo.php";
require_once "../plantilla/PagoConTargeta.php";



switch ($_GET["op"]) 
{	
	case 'confirmarOrdenPedido':		
		$numero = $_POST["numeroOrden"];
		$cliente = $_POST["cliente"];
		$orden = new OrdenVenta($numero, $cliente);

		if (isset($_POST["nombresProdSimp"])) {
			$nombresProductosSimple = $_POST["nombresProdSimp"];
			$preciosProductosSimple = $_POST["preciosProdSimp"];

			for ($i=0; $i < count($nombresProductosSimple); $i++) { 
				$nombre = $nombresProductosSimple[$i];
				$precio = $preciosProductosSimple[$i];
				$producto = new ProductoSimple($nombre, $precio);

				$orden->agregarProducto($producto);
			}			
		}

		if (isset($_POST["nombresCombos"])) {
			$nombresCombos = $_POST["nombresCombos"];
			$preciosCombos = $_POST["preciosCombos"];
			$idCombos = $_POST["idCombos"];

			for ($i=0; $i < count($nombresCombos); $i++) {
				$nombre2 = $nombresCombos[$i];
				$productoCompuesto = new ProductoCompuesto($nombre2);

				$idCombo = $idCombos[$i];
				
				agregarProductosByCombo($idCombo, $productoCompuesto);
				
				$orden->agregarProducto($productoCompuesto);
			}			
		}

		$precioTotal = $orden->getPrecio();
		echo $precioTotal;	   
		//echo $orden->imprimirOrden();		
	break;

	case 'pagarEnEfectivo':
		$precio = $_GET["precio"];

		$pagoEfectivo = new PagoEfectivo();
		$pagoEfectivo->setPrecio($precio);
		$pagoEfectivo->calcularPagoCompra();

		echo $pagoEfectivo->getPagoEfectivo();		
	break;

	case 'pagarConTargeta':
		$precio = $_GET["precio"];

		$pagoConTargeta = new PagoConTargeta();
		$pagoConTargeta->setPrecio($precio);
		$pagoConTargeta->calcularPagoCompra();

		echo $pagoConTargeta->getPagoConTargeta();		
	break;

}


function agregarProductosByCombo($idCombo, &$productoCompuesto) 
{
	//var_dump($idCombo);
	switch ($idCombo) {
		case "1":			
			$nombre = "Pizza Jamon y Queso Familiar";
			$precio = 45;
			$producto = new ProductoSimple($nombre, $precio);
			$productoCompuesto->agregarProducto($producto);
			$nombre = "Coca Cola 2L";
			$precio = 12;
			$producto = new ProductoSimple($nombre, $precio);
			$productoCompuesto->agregarProducto($producto);			
			break;
			
		case "2":
			$nombre = "Pizza Margarita Familiar";
			$precio = 45;
			$producto = new ProductoSimple($nombre, $precio);
			$productoCompuesto->agregarProducto($producto);
			$nombre = "Pizza Peperoni Familiar";
			$precio = 45;
			$producto = new ProductoSimple($nombre, $precio);
			$productoCompuesto->agregarProducto($producto);
			$nombre = "Fanta Naranja 2L";
			$precio = 12;
			$producto = new ProductoSimple($nombre, $precio);
			$productoCompuesto->agregarProducto($producto);			
			break;
		
		default:			
			break;
	}	
}

?>