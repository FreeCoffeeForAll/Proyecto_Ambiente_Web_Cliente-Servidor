<?php

if(!isset($_SESSION['username']) or $_SESSION['rol'] != 1){
    header("location: homePage.php");
}

//1. Establecer la conexión con el motor de base de datos y seleccionar la base de datos que vamos a utilizar
$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Ocurrió un error al establecer la conexión: {$conexion->connect_error}";
}

//2. Ejecutar la consulta. (Ingresar datos)
$conexion->query("delete from usuarios
                where id_Usuario = '{$_POST['id']}'");

if($conexion->error != ''){
    echo "Ocurrió un error al ejecutar la consulta: {$conexion->error}";
}

//3. Cerrar la conexión
$conexion->close();       

header("Location: UserDataQuery.php");

?>