<?php

function Conecta(){
    $server= "localhost";
    $user = "root";
    $password = "";
    $dataBase = "tienda";
    $conexion = mysqli_connect($server, $user, $password, $dataBase);

    if(!$conexion){
        echo "Ocurrio un error al establecer la conexion". mysqli_connect_error();
    }
    return $conexion;
}

function Desconecta($conexion){
    mysqli_close($conexion);
}

//CONEXION SIMULATION


