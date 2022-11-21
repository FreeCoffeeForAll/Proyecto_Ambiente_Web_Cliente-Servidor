<?php 

$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Error al conectar {$conexion->connect_error}";
} 

?>