<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<title>Mi Tienda Funko</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/index.css">
</head>

<body>
	<?php include("desing/header.php"); ?>
	<div class="main-content">
		<div class="content-page" style="display: block;">
			<div class="title-section">PRODUCTOS DESTACADOS</div>
			<div class="products-list" id="space-list">
			</div>
		</div>
	</div>
	<?php /* include("layouts/_footer.php"); */ ?>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				url: 'service/producto/getProductos.php',
				type: 'POST',
				data: {},
				success: function(data) {
					console.log(data);
					let html = '';
					for (var i = 0; i < data.datos.length; i++) {
						html +=
						


						
						 '<div class="product-box">'+
							'<a href="producto.php?p='+data.datos[i].codpro+'">'+
								'<div class="product">'+
									'<img src="assets/'+data.datos[i].rutimapro+'">'+
									'<div class="detail-title">'+data.datos[i].nompro+'</div>'+
									'<div class="detail-description">'+data.datos[i].despro+'</div>'+
									'<div class="detail-price">'+data.datos[i].prepro+'</div>'+
								'</div>'+
							'</a>'+
						'</div>'; 
					}
					document.getElementById("space-list").innerHTML = html;
				},
				error: function(err) {
					console.error(err);
				}
			});
		});

		function formato_precio(valor) {
			//10.99
			let svalor = valor.toString();
			let array = svalor.split(".");
			return "S/. " + array[0] + ".<span>" + array[1] + "</span>";
		}
	</script>
</body>

</html>