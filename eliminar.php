<?php

$id = $_GET['id'];

echo $id;

$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Error al conectar {$conexion->connect_error}";
}

$conexion->query("delete from producto where id_producto = '$id';");

$conexion->close();

header("Location: ./gestion.php")
?>