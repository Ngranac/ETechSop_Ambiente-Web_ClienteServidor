<?php
include_once "include/header.php";
require_once "DAL/conexion.php";
require_once "DAL/recoge.php";

$mensajeValidacion = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = recogePost("email");
  $password = recogePost("password");

  if (empty($email) || empty($password)) {
    $mensajeValidacion = "Por favor, completa todos los campos.";
  } else {
      $query_check = "SELECT correo FROM usuarios WHERE correo = '$email'";
      $result_check = mysqli_query(Conecta(), $query_check);

      if (mysqli_num_rows($result_check) > 0) {
        $mensajeValidacion = "Este correo electrónico ya está registrado. Por favor, utiliza otro.";
      } else {
          // El correo no está registrado, procede con la inserción
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

          $query_insert = "INSERT INTO usuarios (correo, contrasena) VALUES ('$email', '$hashedPassword')";
          $result_insert = mysqli_query(Conecta(), $query_insert);

          if ($result_insert) {
            $mensajeValidacion = "Registro exitoso. ¡Ahora puedes iniciar sesión!";
          } else {
            $mensajeValidacion = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
          }
      }
  }
}
?>

<main>

<div class="row">
    <div class="col-xs-12 col-md-6 centrar">
        <h2 class="text-center">Registrarme en ETechShop</h2>
        <p class="text-center">Regístrate y realiza tus compras en la mejor plataforma de productos tecnológicos.</p>
        <hr>
        <br>
        <form method="POST" action="" autocomplete="off">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" autocomplete="off">
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="" autocomplete="off">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPasswordConfirm" name="password_confirm" placeholder="">
                <label for="floatingPasswordConfirm">Confirmar Contraseña</label>
            </div>
            <br>
            <label><input type="checkbox"> He leído y acepto los Términos y Condiciones</label>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Registrarme</button>
            <span class="text-dark"><?php echo $mensajeValidacion; ?></span>
            <br>
            <br>
            <a class="text-center" href="index.php">Volver al inicio</a>
        </form>
    </div>
    <div class="col-xs-12 col-md-6">
        <img src="img/img_registro.png" class="img_login">
    </div>
</div>

