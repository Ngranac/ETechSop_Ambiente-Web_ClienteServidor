<?php
session_start();
require_once "DAL/conexion.php";
require_once "DAL/functions.php";
include_once "include/headerCompras.php";

$usuarioActual = $_SESSION['usuario'];

function mostrarComprasUsuario($usuario)
{
    $conexion = Conecta();

    $usuario = mysqli_real_escape_string($conexion, $usuario);

    $query = "SELECT id, total, fecha FROM compras WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        echo "<h2>Mis compras</h2>";
        while ($compra = mysqli_fetch_assoc($resultado)) {
            echo '<div class="card">';
            echo '  <div class="card-body">';
            echo "    <h5 class='card-title'>ID: {$compra['id']}</h5>";
            echo "    <p class='card-text'>Total: {$compra['total']}</p>";
            echo "    <p class='card-text'>Fecha: {$compra['fecha']}</p>";
            echo '  </div>';
            echo '</div>';
        }
    } else {
        echo "<p>No has realizado compras $usuario !.</p>";
    }

    Desconecta($conexion);
}

?>

<!DOCTYPE html>
<html lang="es">
<body>
   <main>
   <div class="container">
    <?php mostrarComprasUsuario($usuarioActual); ?>
    </div>
   </main>
   

</body>
</html>