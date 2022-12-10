<?php
session_start();

if(!isset($_SESSION['username']) or $_SESSION['rol'] != 1){
    header("location: homepage.php");
}

if(isset($_POST['eliminar'])){
    foreach($_SESSION['cart'] as $key => $valor){
        if ($value['nombre'] == $_POST['nombre']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header("location: miCarrito.php");
        }
    }
}

?>