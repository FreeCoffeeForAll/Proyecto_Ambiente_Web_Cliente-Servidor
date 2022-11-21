<?php

$img_name = $_FILES['image']['name'];
$temp_img_name = $_FILES['image']['tmp_name'];
$folder = "./img/";

move_uploaded_file($temp_img_name,$folder.$img_name);

$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$desc = $_POST['descripcion'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$conexion = new mysqli('localhost', 'root', '', 'tienda');

if ($conexion->connect_error != null) {
   echo "Error al conectar {$conexion->connect_error}";
}


$conexion->query("INSERT INTO producto (nom_producto, marca, precio, cantidad, desc_producto, id_categoria, img) VALUES
               ('$nombre','$marca', '$precio', '$cantidad','$desc', '$categoria', '$img_name');");

$conexion->close();

header("Location: gestion.php");
?>