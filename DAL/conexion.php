<?php

function Conecta() {
    $server = "localhost";
    $user = "root";
    $password = ""; 
    $dataBase = "etechshop";

    $conexion = mysqli_connect($server, $user, $password, $dataBase);

    if(!$conexion){
        echo "Ocurrió un error al establecer la conexión " . mysqli_connect_error();
    }

    return $conexion;
}

function Desconecta($conexion) {
    mysqli_close($conexion);
}