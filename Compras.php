<?php
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
            <!-- Producto 1 -->
            <div class="item">
                <figure>
                    <img
                        src="./img/cam.webp"
                        alt="producto"
                    />
                </figure>
                <div class="info-product">
                    <h4>Camara instantanea</h4>
                    <p class="price">₡120000</p>
                    <button class="btn-add-cart" onclick="showNotification()">Añadir al carrito</button>
                </div>
            </div>
            <!-- Producto 2 -->
            <div class="item">
                <figure>
                    <img
                        src="./img/airpodsMax.jpg"
                        alt="producto"
                    />
                </figure>
                <div class="info-product">
                    <h4>Air Pods Max</h4>
                    <p class="price">₡500000</p>
                    <button class="btn-add-cart" onclick="showNotification()">Añadir al carrito</button>
                </div>
            </div>
            <!-- Producto 3 -->
            <div class="item">
                <figure>
                    <img
                        src="./img/macbookpor.webp"
                        alt="producto"
                    />
                </figure>
                <div class="info-product">
                    <h4>MacBook pro</h4>
                    <p class="price">₡850000</p>
                    <button class="btn-add-cart" onclick="showNotification()">Añadir al carrito</button>
                </div>
            </div>
            <!-- Producto 4 -->
            <div class="item">
                <figure>
                    <img
                        src="./img/ipad mini.webp"
                        alt="producto"
                    />
                </figure>
                <div class="info-product">
                    <h4>Ipad mini</h4>
                    <p class="price">₡45000</p>
                    <button class="btn-add-cart" onclick="showNotification()">Añadir al carrito</button>
                </div>
            </div>
            <!-- Producto 6 -->
            <div class="item">
                <figure>
                    <img
                        src="./img/audifinos bluetooth.jpg"
                        alt="producto"
                    />
                </figure>
                <div class="info-product">
                    <h4>audifinos bluetooth</h4>
                    <p class="price">₡45000</p>
                    <button class="btn-add-cart" onclick="showNotification()">Añadir al carrito</button>
                </div>
            </div>
            <!-- Producto 6 -->
            <div class="item">
                <figure>
                    <img
                        src="./img/Audifonos bluetooth morados.webp"
                        alt="producto"
                    />
                </figure>
                <div class="info-product">
                    <h4>Audifonos bluetooth morados</h4>
                    <p class="price">₡45000</p>
                    <button class="btn-add-cart" onclick="showNotification()">Añadir al carrito</button>
                </div>
            </div>
            <!-- Producto 7 -->
            <div class="item">
                <figure>
                    <img
                        src="./img/audifonosalambricos.jpg"
                        alt="producto"
                    />
                </figure>
                <div class="info-product">
                    <h4>audifonos alambricos</h4>
                    <p class="price">₡4500</p>
                    <button class="btn-add-cart" onclick="showNotification()">Añadir al carrito</button>
                </div>
            </div>
            <!-- Producto 8 -->
            <div class="item">
                <figure>
                    <img
                        src="./img/Audifonos apple.webp"
                        alt="producto"
                    />
                </figure>
                <div class="info-product">
                    <h4>Audifonos Apple</h4>
                    <p class="price">₡4500</p>
                    <button class="btn-add-cart" onclick="showNotification()">Añadir al carrito</button>
                </div>
            </div>

    </main>

</body>
<?php
include_once "./Include/footer.php"
?>

</html>
