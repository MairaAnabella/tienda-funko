<?php

function validarEmail($validaCorreo){

if(mysqli_num_rows($validaCorreo) > 0 ){
    echo "
    <script>
    alert('este correo ya esta registrado, intenta con otro diferente');
    window.location='../index.php';
    </script>
    ";
$mailValido=true;

exit();
}
}


function validarUsuario($validaUsuario){
    if(mysqli_num_rows($validaUsuario)>0){
        echo " <script>alert('este usuario ya esta registrado, intenta con otro diferente ');
        window.location='../index.php' </script>";
        exit();
    }
}

?>