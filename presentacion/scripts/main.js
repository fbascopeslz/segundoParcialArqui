
//Función que se ejecuta al inicio
function init() {
	$("#tablaDePedido").hide();	

	$("#btnIniciarOrden").on("click", function(e) {
		$("#tablaDePedido").show();		
		$("#btnIniciarOrden").prop("disabled", true);
	});

	$("#formulario").on("submit", function(e) {
		confirmarPedido(e);
	});

	$("#btnMetodoDePago").click(function() {	
		var numeroOrden = $("#numeroOrden").val();
		var cliente = $("#cliente").val();
		$("#numeroOrden2").val(numeroOrden);
		$("#cliente2").val(cliente);

		var formData = new FormData($("#formulario")[0]);
		$.ajax({
			url: "../main.php?op=confirmarOrdenPedido",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,

			success: function(datos)
			{                    			
				$("#montoAPagar").val(datos);
			}
		});		
	});

	$("#btnPagarEnEfectivo").click(function() {
		var costoTotal = $("#montoAPagar").val();

		$.post("../main.php?op=pagarEnEfectivo&precio=" + costoTotal, function(respuesta) {			
			var dialog = bootbox.dialog({
				title: 'Pago en Efectivo',
				message: "<p>El pago en efectivo tiene un descuento de 5%. El monto a pagar sera de: " + respuesta + "</p>",
				size: 'large',
				buttons: {
					cancel: {
						label: "Cancelar",
						className: 'btn-danger',
						callback: function(){

						}
					},					
					ok: {
						label: "Aceptar",
						className: 'btn-info',
						callback: function(){
							bootbox.alert("El pago se realizo correctamente!");
						}
					}
				}
			});
		});						
	});


	$("#btnPagarConTargeta").click(function() {
		var costoTotal = $("#montoAPagar").val();

		$.post("../main.php?op=pagarConTargeta&precio=" + costoTotal, function(respuesta) {			
			var dialog = bootbox.dialog({
				title: 'Pago con Targeta',
				message: "<p>El pago con Targeta tiene un descuento de 18%. El monto a pagar sera de: " + respuesta + "</p>",
				size: 'large',
				buttons: {
					cancel: {
						label: "Cancelar",
						className: 'btn-danger',
						callback: function(){

						}
					},					
					ok: {
						label: "Aceptar",
						className: 'btn-info',
						callback: function(){
							bootbox.alert("El pago se realizo correctamente!");
						}
					}
				}
			});
		});						
	});

}

var cont = 1;

function agregarProductoSimple(nombre, precio, imagen) {
	var fila =
		'<tr class="filas" id="fila' + cont + '">' +
			'<td><button type="button" class="btn btn-danger" onclick="eliminarDetallePedido(' + cont + ')">X</button></td>'+
			'<td>' + cont + '</td>'+
			'<td><input type="hidden" name="nombresProdSimp[]" id="nombresProdSimp[]" value="' + nombre + '">' + nombre + '</td>'+
			'<td><input type="hidden" name="preciosProdSimp[]" id="preciosProdSimp[]" value="' + precio + '">' + precio + '</td>'+
			'<td>' + '<img src="' + imagen + '" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;">' +  '</td>' +					
		'</tr>';
	
	cont++;  
	$('#tablaTodosLosPedidos').append(fila);
}

function agregarCombo(nombre, precio, idCombo, imagen) {
	var fila =
		'<tr class="filas" id="fila'+cont+'">'+
			'<td><button type="button" class="btn btn-danger" onclick="eliminarDetallePedido('+cont+')">X</button></td>'+
			'<td><input type="hidden" value="' + cont + '">' + cont +'</td>'+
			'<td><input type="hidden" name="nombresCombos[]" id="nombresCombos[]" value="' + nombre + '">' + nombre + '</td>'+
			'<td>' +
				'<input type="hidden" id="idCombos[]" name="idCombos[]" value="' + idCombo + '">' + 
				'<input type="hidden" name="preciosCombos[]" id="preciosCombos[]" value="' + precio + '">' +
				precio +
			'</td>' +	
			'<td>' + '<img src="' + imagen + '" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;">' +  '</td>' +					
		'</tr>';
	
	cont++;  
	$('#tablaTodosLosPedidos').append(fila);
}

function eliminarDetallePedido(index) {		
	$("#fila" + index).remove();	
	cont = cont - 1;
}

function confirmarPedido(e) {		
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnIniciarOrden").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../main.php?op=confirmarOrdenPedido",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
			bootbox.alert("El precio total de la Orden de Venta es: " + datos);
			$("#btnIniciarOrden").prop("disabled", false);
	    }
	});	
}


init();