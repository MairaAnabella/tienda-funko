<?php 
/* require_once './conexion.php';

if(isset($_GET['token']))
{
    $token = $_GET['token'];

    //Inicializa las variables de contraseña con valores vacíos o los valores ingresados por el usuario
    $nuevaContraseña = '';
    $confirmarContraseña = '';

    //Consultamos la base de datos para encontrar el registro con el token recibido
    $stmt = $pdo->query("SELECT * FROM users WHERE remember_token = '$token'");

    //Si la consulta encuentra un registro
    if ($stmt->rowCount() > 0) {

        //Verificar si se ha enviado el formulario
        if (isset($_POST['confirmar'])) {
            $nuevaContraseña = isset($_POST['nuevaContraseña']) ? htmlspecialchars($_POST['nuevaContraseña']) : '';
            $confirmarContraseña = isset($_POST['confirmarContraseña']) ? htmlspecialchars($_POST['confirmarContraseña']) : '';

            //Verificar si las contraseñas coinciden
            if ($nuevaContraseña === $confirmarContraseña) {
                // Verificar si la contraseña cumple con los requisitos de seguridad
                if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $nuevaContraseña)) {
                    // Actualizar la contraseña en la base de datos
                    $stmtUpdate = $pdo->prepare("UPDATE users SET password = ?, remember_token = ? WHERE remember_token = ?");
                    $stmtUpdate->execute([password_hash($nuevaContraseña, PASSWORD_DEFAULT),'', $token]);

                    //Mostrar mensaje de éxito
                    echo '<div align="center" class="alert alert-success">
                            <strong>Contraseña actualizada con éxito.</strong>
                            <p>Serás redirigido en <span id="countdown">5</span> segundos.</p>
                          </div>';

                    echo '<script>
                            var countdown = 5;
                            var timer = setInterval(function() {
                                document.getElementById("formulario").style.display = "none";
                                document.getElementById("countdown").textContent = countdown;
                                if (countdown <= 0) {
                                    clearInterval(timer);
                                    window.location.href = "http://siufprueba.unionferroviaria.org.ar/";
                                }
                                countdown--; // Asegúrate de decrementar el contador aquí
                            }, 1000); // Cambié 1 a 1000 para que la cuenta regresiva ocurra cada segundo
                          </script>';               
                          
                } else {
                    //Mostrar mensaje de error si la contraseña no cumple con los requisitos
                    echo '<div align="center" class="alert alert-danger">
                            <strong>La contraseña no cumple con los requisitos de seguridad.</strong>
                            <p>Debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.</p>
                          </div>';
                }
                
            } else {
                //Mostrar mensaje de error si las contraseñas no coinciden
                echo '<div align="center" class="alert alert-danger">
                        <strong>Las contraseñas no coinciden.</strong>
                        <p>Por favor, verifica que ambas contraseñas sean iguales.</p>
                      </div>';
            }
        }
 */
?>
    
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        .input-align {
            display: flex;
            justify-content: center;
        }

        .input-short {
            max-width: 500px;
        }
    </style>
    <script>
        //Funcion
        function togglePasswordVisibility(input, icono) {
            var input = document.getElementById(input);
            var icono = document.getElementById(icono);

            if (input.type === "password") {
                input.type = "text";
                icono.classList.remove("fa-eye-slash");
                icono.classList.add("fa-eye");
            } else {
                input.type = "password";
                icono.classList.remove("fa-eye");
                icono.classList.add("fa-eye-slash");
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div align="center" id="formulario">
            <h2 class="my-3">Actualizar Contraseña</h2>
            <form method="POST" action="confirmarNuevaPassword.php?token=<?php echo $token; ?>" class="needs-validation">
                <div class="input-group mb-3 input-align">
                  <input type="password" id="nuevaContraseña" name="nuevaContraseña" required class="form-control input-short" placeholder="Nueva Contraseña" aria-label="Nueva Contraseña" aria-describedby="button-addon2" value="<?php echo $nuevaContraseña; ?>">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="togglePasswordVisibility('nuevaContraseña', 'toggleNuevaContraseña')">
                    <i class="fa fa-eye-slash" id="toggleNuevaContraseña"></i>
                  </button>
                </div>

                <div class="input-group mb-3 input-align">
                  <input type="password" id="confirmarContraseña" name="confirmarContraseña" required class="form-control input-short" placeholder="Confirmar Nueva Contraseña" aria-label="Confirmar Nueva Contraseña" aria-describedby="button-addon2" value="<?php echo $confirmarContraseña; ?>">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="togglePasswordVisibility('confirmarContraseña', 'toggleConfirmarContraseña')">
                    <i class="fa fa-eye-slash" id="toggleConfirmarContraseña"></i>
                  </button>
                </div>

                <p><b>Recordatorio:</b> La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.</p><br>

                <input type="submit" name="confirmar" value="Confirmar Nueva Contraseña" class="btn btn-success">
            </form>
        </div>
    </div>
</body>
</html>

<?php

    /* } else {

        //Mostramos un mensaje de error
        echo '<div align="center" class="alert alert-danger">
                <strong>El token no es válido.</strong>
                <p>Por favor, inténtelo nuevamente.</p>
              </div>';

    }
 */
/* } */

?>