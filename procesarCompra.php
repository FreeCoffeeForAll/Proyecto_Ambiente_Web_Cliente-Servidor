<?php

include('include/conexionDB.php');

$id = $_POST['id'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];

$conexion->query("UPDATE compras set total_precio = '$precio',
                                     estado = '$estado'
                                     where id_compra = '$id'");

header("location: gestionCompra.php");

$conexion->close();
?>