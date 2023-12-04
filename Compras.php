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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body> 

    <main>
        
        <br>
        <div class="contenedor1">
                <div class="contenedor1-A">
                    <h1>Descuento de 50% en compras mayores a 4 articulos </h1>
                    <p>Revisa la información de los artículos</p>
                    <button class="btn btn_comprar">Comprar</button>
                </div>
                <div class="contenedor1-B">
                    <img src="./img/fondo.jpg" class="img_mac">
                </div>
        </div>


        <br>
        <h4>Novedades de hoy</h4>
        <br>   
    <div class="objetos">
        <?php
          $nombreUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
        $productos = getAvailableProducts();

        foreach ($productos as $product) {
            echo '<div class="item">
                    <figure>
                        <img src="' . $product['imagen'] . '" alt="' . $product['Nombre'] . '" />
                    </figure>
                    <div class="info-product">
                        <h4>' . $product['Nombre'] . '</h4>
                        <p class="price">₡' . $product['precio'] . '</p>
                        <a href="agregarproducto.php?id=' . $product['codigo'] . '" class="btn btn-outline-warning" onclick="showNotification()" >Añadir al carrito
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                        </svg></a>
                        
                    </div>
                </div>';
        }
        ?>
    </div>

    </main>


    <script>
        function showNotification() {
            Swal.fire({
                icon: 'success',
                title: 'Agregado correctamente al carrito',
                showConfirmButton: false,
                timer: 150000000
            });
        }
    </script>
</body>
<?php
include_once "./Include/footer.php"
?>

</html>