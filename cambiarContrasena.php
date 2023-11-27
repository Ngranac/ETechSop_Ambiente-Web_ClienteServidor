
<?php
session_start();
require_once "DAL/conexion.php";
require_once "DAL/functions.php";
include_once "include/headerCompras.php";
?>

<main>
<form method="POST" action="procesarContrasena.php">
    <label for="nuevaContrasena">Nueva Contraseña:</label>
    <input type="password" id="nuevaContrasena" name="nuevaContrasena" required>
    <button type="submit">Cambiar Contraseña</button>
</form>
</main>
