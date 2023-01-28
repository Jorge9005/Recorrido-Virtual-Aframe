<?php
//Conexion con la base de datos
function conectarDB() : mysqli{

    $server = "localhost";
    $usuario = "root";
    $contraseña = "";
    $bd = "recorridovirtual";

    $db = mysqli_connect($server, $usuario, $contraseña, $bd);
    $db->set_charset('utf8');
    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}

/* function conectarBD() : mysqli{

    $server = "localhost";
    $usuario = "root";
    $contraseña = "";
    $bd = "recorridovirtual";

    $db = mysqli_connect($server, $usuario, $contraseña, $bd);
    $db->set_charset('utf8');
    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
} */