<?php
require_once "../composite/OrdenVenta.php";
require_once "../composite/ProductoSimple.php";
require_once "../composite/ProductoCompuesto.php";

require_once "../plantilla/PagoEfectivo.php";
require_once "../plantilla/PagoConTargeta.php";

/*
class VacunaPresentacion {
    // Properties
    public $vacunaNegocio;    

    public function __construct()
	{
        $this->vacunaNegocio = new VacunaNegocio();
	}
  
    // Methods
    public function insertar($nombre, $indicaciones, $fechaVencimiento) 
    {        
		$rspta = $this->vacunaNegocio->insertar($nombre, $indicaciones, $fechaVencimiento);
		echo $rspta ? "Vacuna registrada" : "Vacuna no se pudo registrar";		
	}
	
	public function editar($idVacuna, $nombre, $indicaciones, $fechaVencimiento) 
    {        
		$rspta = $this->vacunaNegocio->editar($idVacuna, $nombre, $indicaciones, $fechaVencimiento);
		echo $rspta ? "Vacuna actualizada" : "Vacuna no se pudo actualizar";		
    }
    
    public function mostrar($idVacuna) 
    {
        $rspta = $this->vacunaNegocio->mostrar($idVacuna);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    }

    public function listar() 
    {
        $rspta = $this->vacunaNegocio->listar();
 		//Vamos a declarar un array
 		$data = [];

 		while ($reg = $rspta->fetch_object()) {
 			$data[] = array(
 				"0" => '<button class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
 				"1" => $reg->nombre,
				"2" => $reg->indicaciones,
				"3" => $reg->fechaVencimiento		
 			);
 		}
 		$results = array(
 			"sEcho" => 1, //Información para el datatables
 			"iTotalRecords" => count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			 "aaData" => $data);
			 
 		echo json_encode($results);
    }    
}




$idVacuna = isset($_POST["idVacuna"]) ? limpiarCadena($_POST["idVacuna"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$indicaciones = isset($_POST["indicaciones"]) ? limpiarCadena($_POST["indicaciones"]) : "";
$fechaVencimiento = isset($_POST["fechaVencimiento"]) ? limpiarCadena($_POST["fechaVencimiento"]) : "";

$vacunaPresentacion = new VacunaPresentacion();
*/



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
			//echo var_dump($nombresProductosSimple);
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