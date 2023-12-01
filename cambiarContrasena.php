
<?php
session_start();
require_once "DAL/conexion.php";
require_once "DAL/functions.php";
include_once "include/headerCompras.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETechShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/perfil.css">
    <link rel="stylesheet" href="css/perfil.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<br>
<main>
    <div class="fondo">
    <h2>Para cambiar su contraseña por favor digite la nueva contraseña que desea en la siguiente opcion:</h2>
    <br>
<form method="POST" action="procesarContrasena.php">
    <label for="nuevaContrasena"><h4> Nueva Contraseña:</h4></label>
    <input type="password" id="nuevaContrasena" name="nuevaContrasena" required>
    <button type="submit" class="btmcontras">Cambiar Contraseña</button>
    <button class="btmcontras"><a href="perfil.php">Regresar a perfil</a></button>
</form>
</div>
</main>
<br>
<br>
<br>
<br>
<br>
<br>


<?php
include_once "./Include/footer.php"
?>