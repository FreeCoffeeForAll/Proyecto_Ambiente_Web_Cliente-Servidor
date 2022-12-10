<?php

session_start();

if(!isset($_SESSION['username']) or $_SESSION['rol'] != 1){
    header("location: homepage.php");
}

$img_name = $_FILES['image']['name'];
$temp_img_name = $_FILES['image']['tmp_name'];
$folder = "./img/";

move_uploaded_file($temp_img_name,$folder.$img_name);

$id = $_GET['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$desc = $_POST['descripcion'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];

print_r($categoria);

$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Error al conectar {$conexion->connect_error}";
}

$conexion->query("update producto set nom_producto = '$nombre',
                                      marca = '$marca',
                                      precio = '$precio', 
                                      cantidad = '$cantidad', 
                                      desc_producto = '$desc',
                                      img = '$img_name',
                                      id_categoria = '$categoria'
                                      where id_producto = '$id' ;");

header("Location: gestion.php");

$conexion->close();
?>