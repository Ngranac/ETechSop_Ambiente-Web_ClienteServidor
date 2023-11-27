<?php
session_start();
require_once "DAL/conexion.php";
require_once "DAL/functions.php";
include_once "include/headerCompras.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETechShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="preload" href="../css/style.css">
    <link rel="stylesheet" href="./css/compras.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body> 

    <main>
        
        <br>
       

        <br>
        <h4>Carrito de compras</h4>
        <br>   
        <div class="objetos">
            <?php
            $nombreUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
            $total = 0;
            if (isset($_SESSION['carritoCompras']) && !empty($_SESSION['carritoCompras'])) {
                foreach ($_SESSION['carritoCompras'] as $product_id => $product_details) {
                    echo '<div class="item">
                            <figure>
                                <img src="' . $product_details['imagen'] . '" alt="' . $product_details['Nombre'] . '" />
                            </figure>
                            <div class="info-product">
                                <button class="btn-add-cart" onclick="eliminarProducto(' . $product_id . ')">Eliminar producto del carrito</button>
                                <button class="btn-add-cart" data-bs-toggle="modal" data-bs-target="#modalDetalles' . $product_id . '">Ver detalles</button>
                            </div>
                        </div>';
                        $total += $product_details['precio'];
                    echo '<div class="modal fade" id="modalDetalles' . $product_id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">' . $product_details['Nombre'] . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       <h4>' . $product_details['Nombre'] . '</h4>
                                        <p>' . $product_details['Detalle'] . '</p>
                                        <p class="price">₡' . $product_details['precio'] . '</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "<p>El carrito está vacío.</p>";
            }
            ?>
        </div>
        <button class="btn btn-primary" id="finalizarCompraBtn" data-bs-toggle="modal" data-bs-target="#modalFinalizarCompra">Finalizar Compra</button>
        <a href="Compras.php">Regresar al inicio</a>


        <div class="modal fade" id="modalFinalizarCompra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Finalizar Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Monto Total: $<?php echo $total; ?></p>
                <form id="formularioCompra" action="procesarCompra.php" method="post">
                   <input type="hidden" name="nombreUsuario" value="<?php echo $nombreUsuario; ?>">
                   <input type="hidden" id="totalCompra" name="totalCompra" value="<?php echo $total?>">
                    <label for="numeroTarjeta">Número de Tarjeta:</label>
                    <input type="text" id="numeroTarjeta" name="numeroTarjeta" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="procesarCompra()">Procesar Compra</button>
            </div>
        </div>
    </div>
</div>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function eliminarProducto(productoId) {
 
            $.ajax({
                type: 'POST',
                url: 'eliminarProducto.php', 
                data: { id: productoId },
                success: function(response) {
                    location.reload();
                },
                error: function(error) {
                    console.error('Error al eliminar el producto:', error);
                }
            });
        }
    function procesarCompra() {
       document.getElementById('formularioCompra').submit();
    }
    </script>
</body>
<?php
include_once "./Include/footer.php"
?>

</html>