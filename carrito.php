<?php
session_start();
if (!isset($_SESSION['cod'])) {
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Carrito</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
	<?php include("desing/header.php"); ?>

	<div class="main-content">

		<div class="content-page3">

			<div class="body-pedidos" id="space-list">
			</div>
			<div class="fomPago">
				<h3 class="tittle-carrito" style=" display: block; margin-top: 8%;">MI CARRITO</h3>
				<p>Ingrese los datos para finalizar la compra. <br>Gracias!</p>
				<div id="mensaje" style="display: none;">Su compra fue registrada</div>
				<input class="ipt-procom" type="text" id="dirusu" placeholder="Dirección">
				<br>
				<input class="ipt-procom" type="text" id="telusu" placeholder="Celular">
				<br>
				<h4>Tipos de pago</h4>
				<div class="metodo-pago">
					<input type="radio" name="tipopago" value="1" id="tipo1">
					<label for="tipo1">Pago por transferencia</label>
				</div>
				<div class="metodo-pago">
					<input type="radio" name="tipopago" value="2" id="tipo2">
					<label for="tipo2">Pago con tarjeta de crédito/débito</label>
				</div>

				<button onclick="procesar_compra()" style="margin-top: 5px;" class="raise">Procesar compra</button>
			</div>

		</div>
	</div>
	<?php /* include("layouts/_footer.php"); */ ?>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				url: 'service/pedido/get_porprocesar.php',
				type: 'POST',
				data: {},
				success: function(data) {
					console.log(data);
					let html = '';
					let sumaMonto = 0;
					for (var i = 0; i < data.datos.length; i++) {
						html +=
							'<div class="item-pedido">' +
							'<div class="pedido-img">' +
							'<img src="assets/' + data.datos[i].rutimapro + '">' +
							'</div>' +
							'<div class="pedido-detalle">' +
							'<h3>' + data.datos[i].nompro + '</h3>' +
							'<p><b>Precio:</b> S/ ' + data.datos[i].prepro + '</p>' +
							'<p><b>Fecha:</b> ' + data.datos[i].fecped + '</p>' +
							'<p><b>Estado:</b> ' + data.datos[i].estado + '</p>' +
							'<p><b>Dirección:</b> ' + data.datos[i].dirusuped + '</p>' +
							'<p><b>Celular:</b> ' + data.datos[i].telusuped + '</p>' +
							'<button class="raise" onclick="delete_product(' + data.datos[i].codped + ')">Eliminar</button>' +
							'</div>' +
							'</div>';
						sumaMonto += parseInt(data.datos[i].prepro) + 1;
					}
					console.log(data);
					if (data.datos.length == 0) {
						alert("No hay productos en carrito");
						window.history.back();
					}

					document.getElementById("space-list").innerHTML = html;
				},
				error: function(err) {
					console.error(err);
				}
			});
		});

		function delete_product(codped) {
			$.ajax({
				url: 'service/pedido/delete_pedido.php',
				type: 'POST',
				data: {
					codped: codped,
				},
				success: function(data) {
					console.log(data);
					if (data.state) {
						window.location.reload();
					} else {
						alert(data.detail);
					}
				},
				error: function(err) {
					console.error(err);
				}
			});
		}

		function procesar_compra() {
			let dirusu = document.getElementById("dirusu").value;
			let telusu = $("#telusu").val();
			let tipopago = 1;
			if (document.getElementById("tipo2").checked) {
				tipopago = 2;
			}
			if (dirusu == "" || telusu == "") {
				alert("Complete los campos");
			} else {
				if (!document.getElementById("tipo1").checked &&
					!document.getElementById("tipo2").checked) {
					alert("Seleccione un método de pago!");
				} else {

					var mensajeDiv = document.getElementById('mensaje');
					mensajeDiv.style.display = 'block';
					var direccion = document.getElementById('dirusu');
					var celular = document.getElementById('telusu');
					var tipoPago1 = document.getElementById('tipo1');
					var tipoPago2 = document.getElementById('tipo2');

					if (direccion && celular && tipoPago1 && tipoPago2) {
						direccion.style.display = 'none';
						celular.style.display = 'none';
						tipoPago1.style.display = 'none';
						tipoPago2.style.display = 'none';
					}


				}
			}
		}
	</script>


</body>

</html>