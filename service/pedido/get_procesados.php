<?php
include('../conexion.php');

$response = new stdClass();

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

$datos = [];
$i = 0;
$sql = "SELECT *, ped.estado as estadoped FROM pedido ped
        INNER JOIN producto pro ON ped.codpro = pro.codprod
        WHERE ped.estado = 1";

$result = mysqli_query($con, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $obj = new stdClass();
            $obj->codped = $row['codped'];
            $obj->codpro = $row['codprod'];
            $obj->nompro = utf8_encode($row['nombre']);
            $obj->prepro = $row['precio'];
            $obj->rutimapro = $row['rutaimagen'];
            $obj->fecped = $row['fecped'];
            $obj->dirusuped = utf8_encode($row['dirusuped']);
            $obj->telusuped = $row['telusuped'];
            $obj->estado = estado2texto($row['estadoped']);
            $datos[$i] = $obj;
            $i++;
        }
        $response->datos = $datos;
    } else {
        $response->error = "No se encontraron filas para la consulta.";
    }
} else {
    $response->error = "Error al ejecutar la consulta: " . mysqli_error($con);
}

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
?>
