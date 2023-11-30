<?php
include('../conexion.php');
$response=new stdClass();

function estado2texto($id){
	switch ($id) {
		case '1':
			return 'Por procesar';
			break;
		case '2':
			return 'Por pagar';
			break;
		default:
			break;
	}
}

$datos=[];
$i=0;
$sql="select *,ped.estado estadoped from pedido ped
inner join producto pro
on ped.codpro=pro.codprod
where ped.estado=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->codped=$row['codped'];
	$obj->codpro=$row['codprod'];
	$obj->nompro=utf8_encode($row['nombre']);
	$obj->prepro=$row['precio'];
	$obj->rutimapro=$row['rutaimagen'];
	$obj->fecped=$row['fecped'];
	$obj->estado=estado2texto($row['estado']);
	$obj->dirusuped=utf8_encode($row['email']);
	$obj->telusuped=$row['telefono'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');

echo json_encode($response);
