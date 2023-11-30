<?php
include("conexion.php");
session_start(); // Inicia la sesión al principio del script

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];

    $query = "SELECT * FROM usuarios WHERE email='$email'";

    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        var_dump($row);

        if ($row) {
            $password = $_POST["password"];
            echo password_verify($password, $row['contrasena']);
            if (password_verify($password, $row['contrasena'])) {
                $_SESSION['cod'] = $row['cod'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user'] = $row['usuario'];
                $_SESSION['nombreC'] = $row['nombrecompleto'];
           
                header('Location: ../'); // Redirige al usuario a la página principal
            } else {
                header('Location: ../login.php?e=3'); // Contraseña incorrecta
            }
        } else {
            header('Location: ../login.php?e=2'); // Usuario no encontrado
        }
    } else {
        header('Location: ../login.php?e=1'); // Error en la consulta SQL
    }
} else {
    // Manejar el caso en que no se hayan enviado las credenciales
    header('Location: ../login.php?e=4');
}
