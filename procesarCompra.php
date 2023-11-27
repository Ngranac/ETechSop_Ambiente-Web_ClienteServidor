<?php
session_start();
require_once "DAL/conexion.php";
require_once "DAL/recoge.php";
require_once "DAL/functions.php";
// Recoge datos del formulario
$nombreUsuario = recogePost("nombreUsuario");
$totalCompra = recogePost("totalCompra");
$fechaCompra = date("Y-m-d H:i:s");


$conexion = Conecta();
$queryInsert = "INSERT INTO compras (usuario, total, fecha) VALUES ('$nombreUsuario', $totalCompra, '$fechaCompra')";
$resultInsert = mysqli_query($conexion, $queryInsert);

if ($resultInsert) {
 
    $idCompra = mysqli_insert_id($conexion);

   
    if (isset($_SESSION['carritoCompras']) && !empty($_SESSION['carritoCompras'])) {
        foreach ($_SESSION['carritoCompras'] as $product_id => $product_details) {
        }
        unset($_SESSION['carritoCompras']);
        
        $_SESSION['mensaje'] = "Compra procesada con éxito.";
        header("Location: carritoCompras.php");
        exit();
    } else {
       
        $_SESSION['mensaje'] = "Error al procesar la compra. Inténtalo de nuevo.";
        header("Location: carritoCompras.php");
        exit();
    }
} else {
    $_SESSION['mensaje'] = "Error al procesar la compra. Inténtalo de nuevo.";
    header("Location: carritoCompras.php");
    exit();
}

Desconecta($conexion);
?>