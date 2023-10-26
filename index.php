<?php
include_once "include/header.php";


$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "DAL/recoger.php";

    $correo = recogePost("correo");
    $contrasena = recogePost("contrasena");

    //Investigar expresiones regulares en PHP
    if ($correo == "") {
        $errores[] = "No se digito el correo";
    }
    if ($contrasena == "") {
        $errores[] = "No se digito la contraseña";
    }

    if (empty($errores)) {
        // echo "Ingreso datos a base de datos";
        require_once "DAL/functions.php";
        $query = "select id, nombre, correo, contraseña from alumno where correo = '$correo'";
        $mySession = getObject($query);

        if($mySession != null){
            $auth = password_verify($contrasena, $mySession['password']);
            if($auth){
                session_start();
                $_SESSION['usuario'] = $mySession['correo'];
                $_SESSION['id'] = $mySession['id'];
                $_SERVER['login'] = true;
                header("Location: consulta-datos.php");
            }else{
                $errores[] = "No se pudo iniciar sesión";
            }
        }else{
            $errores[] = "Usuario no existe";
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