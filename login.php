<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-login.css">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="contenedorFondo">
            <!--CONTENEDOR DE MENSAJE INICIO DE SESION-->
            <div class="contenedorLogin">
                <h3>¿Ya tenes cuenta?</h3>
                <p>Inicia sesión con tu cuenta</p>
               
               <button id="btnInicioSesion" class="raise">Inicia sesión</button>
            </div>
            <div class="contenedorRegistrarse">
                <!--CONTENEDOR DE MENSAJE REGISTRARSE-->
                <h3>¿Aun no tienes cuenta?</h3>
                <p>Registrate para iniciar sesión</p>
               
                <button id="btnRegistrarse" class="raise">Registrarse</button>
            </div>
        </div> <!--Fin de Contenedor De Fondo-->

        <!--FORMULARIOS DE LOGIN Y REGISTRO-->
        <div class="contenedorLoginRegistro">
            <!--FORMULARIO DE INICIO-->
            <form action="service/login.php" class="formLogin" method="post" id="login">
                <h2>Iniciar Sesión</h2>
                <input type="text" placeholder="Correo Electronico" name="email">
                <input type="password" placeholder="Contraseña" name="password">
                <?php
						if (isset($_GET['e'])) {
							switch ($_GET['e']) {
								case '1':
									echo '<p>Error de conexión</p>';
									break;	
								case '2':
									echo '<p>Email inválido</p>';
									break;	
								case '3':
									echo '<p>Contraseña incorrecta</p>';
									break;							
								default:
									break;
							}
						}
					?>
               <button type="submit" id="btnentrar" class="raise">Entrar</button>
                <p id="olvidasteContra">¿Olvidaste tu contraseña?</p>
            </form>
            <!--FORMULARIO DE REGISTRO-->
            <form action="service/insertar.php" class="formRegistro" method="POST">
                <h2>Regístrarse</h2>
                <input type="text" placeholder="Nombre completo"  name="nombreC" >
                <input type="text" placeholder="Correo Electronico" name="email" >
                <input type="text" placeholder="Usuario" name="user" id="user">
                <input type="password" placeholder="Contraseña"  name="password" >
                
                <button  id="btnregistrar" class="raise">Regístrarse</button>
            </form>
            <!--FORMULARIO RESTABLECER CONTRASEÑA-->
            <form action="service/mailRecu.php" class="restablecerContra" method="post" >
                <h2>Restablecer contraseña</h2>
                <input type="text" placeholder="Correo Electronico" name="email">
               
               <button type="submit" id="btnReset" class="raise">Restablecer</button>

            </form>


        </div>







    </main>
    <script src="js/script.js"></script>
</body>

</html>