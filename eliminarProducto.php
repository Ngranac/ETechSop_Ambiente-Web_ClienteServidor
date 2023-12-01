<?php
session_start();

if (isset($_POST['id'])) {
    $productoId = $_POST['id'];

    unset($_SESSION['carritoCompras'][$productoId]);

    echo 'Producto eliminado correctamente';
} else {
    echo 'Error: No se proporcionó un ID de producto';
}
?>