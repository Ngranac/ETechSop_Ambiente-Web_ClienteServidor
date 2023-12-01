<?php
session_start();
require_once "DAL/conexion.php";
require_once "DAL/functions.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $conexion = Conecta();
    $consulta = "SELECT codigo, Nombre, Detalle, imagen, precio FROM productos WHERE codigo = $product_id";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $producto = mysqli_fetch_assoc($resultado);
        if (!isset($_SESSION['carritoCompras'][$product_id])) {
            $_SESSION['carritoCompras'][$product_id] = $producto;
            echo "Producto agregado al carrito";
        } else {
            echo "El producto ya está en el carrito";
        }
       

        Desconecta($conexion);
    } else {
        echo "Producto no encontrado"; 
    }
}

header("Location: Compras.php");
?>