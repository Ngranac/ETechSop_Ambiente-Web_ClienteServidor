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
                    <h1>Descuento 50% de descuento en compras mayores a 4 articulos</h1>
                    <p>Revisa la información de los artículos</p>
                    <button class="boton">Comprar</button>
                </div>
                <div class="contenedor1-B">
                    <img src="./img/Apple-MacBook" class="img_mac">
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
                        <div class="rating ">
                        <input type="radio" name="clr1" style="--c:#ff9933" >
                        <input type="radio" name="clr1" style="--c:#ff9933">
                        <input type="radio" name="clr1" style="--c:#ff9933">
                        <input type="radio" name="clr1" style="--c:#ff9933">
                        <input type="radio" name="clr1" style="--c:#ff9933">
                    </div>
                        <a href="agregarproducto.php?id=' . $product['codigo'] . '" class="btn btn-outline-warning" onclick="showNotification()" >Añadir al carrito</a>
                   
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