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
                        <a href="agregarproducto.php?id=' . $product['codigo'] . '" class="btn-add-cart">Añadir al carrito</a>
                    </div>
                </div>';
        }
        ?>
    </div>

    </main>

</body>
<?php
include_once "./Include/footer.php"
?>

</html>