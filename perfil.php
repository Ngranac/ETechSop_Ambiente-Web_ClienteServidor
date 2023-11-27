
<?php
session_start();
require_once "DAL/conexion.php";
require_once "DAL/functions.php";
include_once "include/headerCompras.php";
?>


<main>
<?php
    $usuario = obtenerInformacionUsuario($_SESSION['usuario']); 

    echo '<label>Correo: </label>' . $usuario['correo'] . '<br>';
    echo '<label>Contraseña: </label>' . $usuario['contrasena'] . ' <a href="cambiarContrasena.php">Cambiar Contraseña</a><br>';
    ?>
    

    
</main>
