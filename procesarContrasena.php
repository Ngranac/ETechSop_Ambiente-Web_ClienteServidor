<?php

session_start();
require_once "DAL/conexion.php";
require_once "DAL/functions.php";
require_once "DAL/recoge.php";

$correo = $_SESSION['usuario'];
$nuevaContrasena = recogePost("nuevaContrasena");

if (actualizarContrasena($correo, $nuevaContrasena)) {
    $_SESSION['mensaje'] = "Contraseña actualizada con éxito.";
} else {
    $_SESSION['mensaje'] = "Error al actualizar la contraseña. Inténtalo de nuevo.";
}

header("Location: perfil.php");
exit();
?>