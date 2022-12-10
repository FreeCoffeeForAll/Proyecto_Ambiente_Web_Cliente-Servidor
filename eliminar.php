<?php

session_start();

if(!isset($_SESSION['username']) or $_SESSION['username'] != 1){
    header("location: homepage.php");
}

$id = $_POST['id'];

echo $id;

$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Error al conectar {$conexion->connect_error}";
}

$conexion->query("delete from producto where id_producto = '$id';");

$conexion->close();

header("Location: ./gestion.php")
?>