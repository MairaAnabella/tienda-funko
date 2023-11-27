<?php
include('../conexion.php');
$response=new stdClass();

//$datos=array();
$datos=[];
$i=0;
$text=$_POST['text'];
$sql="select * from producto where estado=1 and nombre LIKE '%$text%'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->codpro=$row['codprod'];
	$obj->nompro=$row['nombre'];
	$obj->despro=$row['descrip'];
	$obj->prepro=$row['precio'];
	$obj->rutimapro=$row['rutaimagen'];
	$datos[$i]=$obj;
	$i++;
}

$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
