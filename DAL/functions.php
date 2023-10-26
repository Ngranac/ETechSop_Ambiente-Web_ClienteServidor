<?php

use PSpell\Config;

require_once "conexion.php";

function getArray($sql) {
    try {
        $oConexion = Conecta();

        //formato datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            
            if(!$result = mysqli_query($oConexion, $sql)) die(); //cancelamos el programa

            $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }

    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    }finally{
        Desconecta($oConexion);
    }

    return $retorno;
}

function getObject($sql) {
    try {
        $oConexion = Conecta();

        //formato datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            
            if(!$result = mysqli_query($oConexion, $sql)) die(); 

            $retorno = null;

            while ($row = mysqli_fetch_array($result)) {
                $retorno = $row;
            }
        }

    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    }finally{
        Desconecta($oConexion);
    }

    return $retorno;
}

function DefinirContrasena($pCorreo, $pContrasena) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        //formato datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("update alumno set password = ? where correo = ?");
            $stmt->bind_param("ss", $iContrasena, $iCorreo);

            //set parametros y luego ejecutarl
            $iCorreo = $pCorreo;
            $iContrasena = $pContrasena;

            if($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    }finally{
        Desconecta($oConexion);
    }

    return $retorno;
}