<?php
session_start();
$response=new stdClass();

if (!isset($_SESSION['cod'])) {
	$response->state=false;
	$response->detail="No esta logeado";
	$response->open_login=true;
}else{
	include_once('../conexion.php');
	$codusu=$_SESSION['cod'];
	$codpro=$_POST['codpro'];
	$sql="INSERT INTO pedido
	(codusu,codpro,fecped,estado,dirusuped,telusuped)
	VALUES
	($codusu,$codpro,now(),1,'','')";
	$result=mysqli_query($con,$sql);
	if ($result) {
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->state=false;
		$response->detail="No se pudo agregar producto. Intente más tarde";
	}
	mysqli_close($con);
}

header('Content-Type: application/json');
echo json_encode($response);