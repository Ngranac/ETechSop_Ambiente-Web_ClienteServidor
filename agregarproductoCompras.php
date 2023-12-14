<?php
session_start();
require_once "DAL/conexion.php";
require_once "DAL/functions.php";
require_once "DAL/recoge.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = recogePost("nombre");
    $detalle = recogePost("detalle");
    $precio = recogePost("precio");
    $imagen = recogePost("imagen");
    if (!empty($nombre) && !empty($detalle) && is_numeric($precio) && !empty($imagen)) {
        $conexion = Conecta();
        $nombre = mysqli_real_escape_string($conexion, $nombre);
        $detalle = mysqli_real_escape_string($conexion, $detalle);
        $imagen = mysqli_real_escape_string($conexion, $imagen);

        $consulta = "INSERT INTO productos (Nombre, Detalle, precio, imagen) VALUES ('$nombre', '$detalle', $precio, '$imagen')";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            $_SESSION['mensaje'] = "success|Producto guardado con éxito.";
            header("Location: Compras.php");
            exit();
        } else {
            $_SESSION['mensaje'] = "danger|Error al guardar el producto: " . mysqli_error($conexion);
            header("Location: Compras.php");
            exit();
        }

        Desconecta($conexion);
    } else {
        $_SESSION['mensaje'] = "warning|Datos de formulario incorrectos.";
        header("Location: Compras.php");
        exit();
    }
} else {
    header("Location: Compras.php");
    exit();
}
?>