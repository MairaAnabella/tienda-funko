<?php
include("conexion.php");




$email = $_POST["email"];


$query = "SELECT usuario FROM usuarios WHERE email='$email' ";


$ejecutar = mysqli_query($con, $query);

if ($ejecutar) {
    $row = mysqli_fetch_array($ejecutar);
    $count = mysqli_fetch_array($ejecutar);
    if ($count != 0) {
        $password = $_POST["password"];
        if ($row['password'] != $password) {
            header('Location: ../login.php?e=3');
        } else {
            session_start();
            $_SESSION['codusu'] = $row['codusu'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['nombre'] = $row['nombre'];
            header('Location: ../');
        }
    }else{
        header('Location: ../login.php?e=2');
    }
}else{
	header('Location: ../login.php?e=1');
}


