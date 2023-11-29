<?php
include("conexion.php");
$getmysql = new mysqlConexion();
$getConexion = $getmysql->conexion();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$email = $_POST["email"];
$query = "SELECT * FROM usuarios WHERE email='$email'";
$validaCorreo = mysqli_query($getConexion, $query);

if ($validaCorreo === false) {
    // La consulta SQL falló
    echo 'Error en la consulta: ' . mysqli_error($getConexion);
} else {
    if (mysqli_num_rows($validaCorreo) > 0) {
        $row = mysqli_fetch_assoc($validaCorreo); // Obtén la fila de datos del usuario

        $mail = new PHPMailer(true);

        try {
          // Configuración del servidor
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '39096699@itbeltran.com.ar';
        $mail->Password   = '21061994Maira';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $correo = $row['email']; // Obtén el correo del usuario
        $nombreUsuario = $row['nombreCompleto']; // Obtén el nombre del usuario

        $mail->setFrom('39096699@itbeltran.com.ar', 'Pagina Web');
        $mail->addAddress($correo, $nombreUsuario);

        $mail->isHTML(true);
        $mail->Subject = 'RESET DE CLAVE :) ';
        $mail->Body = '<html>
            <head>
                <title>Actualizar Contraseña</title>
            </head>
            <body>
                <h1>Hola ' . $nombreUsuario . ', haz solicitado recuperar la contraseña</h1>
                <p>Haga click en el siguiente enlace para actualizar la contraseña:</p>
                <a href="http://localhost/ejemplos/Login/php/cambioClave.php">Actualizar contraseña</a>
                <p>Luego de haber realizado la actualización podrá ingresar al sistema con su nueva contraseña.</p>
                <p>Atte.</p>
                <p><b>SiUF Hotel.</b></p>
            </body>
        </html>';

        $mail->send(); // Envía el correo

        } catch (Exception $e) {
            echo '<div class="alert error" role="alert">NO SE PUDO ENVIAR EL ERROR ES EL SIGUIENTE: ' . $mail->ErrorInfo . '</div>';
        }
    } else {
        echo 'No se encontraron resultados para el correo proporcionado.';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <p>hola</p>
</body>
</html>