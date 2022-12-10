<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: homepage.php");
}

$id = $_GET['id'];

require('include/conexionDB.php');
$resultado = $conexion->query("select id_producto,img, nom_producto, marca, precio, cantidad, desc_producto, 
                                id_categoria, img from producto where id_producto={$id}");


while ($row = $resultado->fetch_assoc()) {
    //si ya está añadido 
    if (isset($_SESSION['cart'])) {
        $items = array_column($_SESSION['cart'], 'nombre');
        if (in_array($row['nom_producto'], $items)) {
            header("Location: miCarrito.php");
        } else {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array(
                "id" => $row['id_producto'],
                "nombre" => $row['nom_producto'],
                "imagen" => $row['img'],
                "marca" => $row['marca'],
                "precio" => $row['precio']
            );
            print_r($_SESSION['cart']);
            header("Location: miCarrito.php");
        }
    } else {
        //añadir 
        $_SESSION['cart'][$count] = array(
                "id" => $row['id_producto'],
            "nombre" => $row['nom_producto'],
            "imagen" => $row['img'],
            "marca" => $row['marca'],
            "precio" => $row['precio']
        );

        print_r($_SESSION['cart']);
        header("location: miCarrito.php");
    }

}

?>