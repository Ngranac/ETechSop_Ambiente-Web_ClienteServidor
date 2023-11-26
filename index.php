<?php
include_once "include/header.php";
require_once "DAL/conexion.php";
require_once "DAL/recoge.php";
$errores = [];

$mensajeValidacion = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = recogePost("email");
    $password = recogePost("password");

    if (empty($email) || empty($password)) {
        $mensajeValidacion = "Por favor, completa todos los campos.";
    } else {
       
        $query = "SELECT contrasena FROM usuarios WHERE correo = '$email'";
        $result = mysqli_query(Conecta(), $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            if (password_verify($password, $row["contrasena"])) {
                $mensajeValidacion = "Inicio de sesión exitoso. ¡Bienvenido!";
                header("Location: Compras.php");
                exit();
            } else {
                $mensajeValidacion = "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
            }
        } else {
            $mensajeValidacion = "Correo electrónico no encontrado. Por favor, regístrate.";
        }
    }
}

?>

<main>

<div class="row">
    <div class="col-xs-12 col-md-6 centrar">
     <h2 class="text-center">Bienvenidos a ETechShop</h2>
     <p class="text-center">Deseas comprar productos tecnologicos, EtechShop es tú plataforma!</p>
     <hr >
     <br>
     <form method="POST" action="">
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Correo electrónico</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="">
        <label for="floatingPassword">Contraseña</label>
    </div>
    <br>
    <a>Olvidaste tu contraseña?</a>
    <br>
    <br>
    <button class="btn btn-primary">Iniciar Sesión</button>
    <span class="text-dark"><?php echo $mensajeValidacion; ?></span>
    <br>
    <br>
    <a class="text-center" href="registrar.php">Registrarme</a>
</form>
    </div>
    <div class="col-xs-12 col-md-6">
        <img src="img/img_login.png" class="img_login">
    </div>
</div>





</main>

<?php
include_once "include/footer.php";
?>