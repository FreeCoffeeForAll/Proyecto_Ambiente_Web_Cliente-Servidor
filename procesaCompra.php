<?php

session_start();

require("include/conexionDB.php");

if (!isset($_SESSION['username']) or $_SESSION['rol'] != 1) {
    header("location: homePage.php");
}

if (isset($_SESSION['cart'])) {
    $array[] = "";
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $valor) {
            array_push($array, $valor['id'], " ");
        }
    }
    $array_final = implode($array);
    $total = $_POST['total'];
    echo $array_final;

    $conexion->query("INSERT INTO compras(id_productos, total_precio ,estado) VALUES('$array_final', $total, 'ENVIADO');");

    if ($_SESSION['cart'] != null) {
        foreach ($_SESSION['cart'] as $key => $valor) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
    header("location: gestionCompra.php");

}



?>