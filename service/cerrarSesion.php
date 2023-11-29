<?php

session_start();


session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a la página principal

echo "<script>
            location.href= '../index.php';
        
        </script>";

exit();
?>