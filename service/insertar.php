<?php
/*                   INFORMACION IMPORTATE A COMPROBAR 

    si uso input type submit en html puedo saber si se envio con 
    if (isset($_POST["btnregistrar"]))
    if ($_POST)
    if (!emplyt($_POST))

    EN ESTE MODELO USAMOS LA ETIQUETA BUTTON QUE POR DEFECTO ES SUBMIT Y NO ES NECESARIO COMPROBAR 
*/


// incluyo el archivo php de conexion 
include("conexion.php");
// hacemos una instancia de la clase 
$getmysql = new mysqlConexion();
// llamo a la funcion de la clase que creamos en conexion
$getConexion = $getmysql->conexion();
include('valida.php');

/*if ($getConexion) {
    echo "conectado a la base de datos";
} else {
    echo "error";
}*/


$nombreCompleto = $_POST["nombreC"];
$email = $_POST["email"];
$user = $_POST["user"];
$password = $_POST["password"];
$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT); //Hashea la contraseña

//CREO LA CONSULTA PARA INSERTAR LOS DATOS
$query = "INSERT INTO usuarios (nombreCompleto,email,usuario,contrasena) VALUES (?,?,?,?)";

//CREO LA SENTENCIA

$sentencia = mysqli_prepare($getConexion, $query);
// ingresar parametros para darle valor a las columnas
//                  sentencia    tipo dato   valores
mysqli_stmt_bind_param($sentencia, "ssss", $nombreCompleto, $email, $user, $passwordHash);



// validar que los datos no se repitan en la BD

$query2="SELECT * FROM usuarios WHERE email='$email'" ;
$validaCorreo=mysqli_query($getConexion,$query2);
validarEmail($validaCorreo);

$query3="SELECT * FROM usuarios WHERE usuario='$user'";
$validaUsuario=mysqli_query($getConexion,$query3);
validarUsuario($validaUsuario);




//ejecutamos la primer query 
mysqli_stmt_execute($sentencia);






// para ver la cantidad de filas afectadas

$afectado = mysqli_stmt_affected_rows($sentencia);

//comprobar si se fueron afectadas las columnas

if ($afectado == 1) {
   
    echo "<script>alert('Se ingreso el usuario $user correctamente'); 
            location.href= '../index.php';
        
        </script>";

} else {
    
    echo "<script>alert('el usuario $user no se agrego correctamente'); 
        location.href= '../index.php';
    
    </script>";

}

// cerrar la sentencia
mysqli_stmt_close($sentencia);
//cerramos la conexion
mysqli_close($getConexion);




?>