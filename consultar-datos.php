<?php

//1. Establecer la conexión con el motor de base de datos y seleccionar la base de datos que vamos a utilizar
$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Ocurrió un error al establecer la conexión: {$conexion->connect_error}";
}

//2. Ejecutar la consulta. (seleccionar datos)
$resultado = $conexion->query("select id_producto, nom_producto, marca, precio, cantidad, desc_producto, id_categoria from producto");

if($conexion->error != ''){
    echo "Ocurrió un error al ejecutar la consulta: {$conexion->error}";
}

//3. Mostrar los resultados de la consulta.

$datos = $resultado->fetch_assoc();

while($datos != null){
    echo "{$datos['id_producto']} <br>";   
    echo "{$datos['nom_producto']} <br>"; 
    echo "{$datos['precio']} <br>";
    echo "<br>";
    $datos = $resultado->fetch_assoc();
}


/* while ($datos != null) {
    echo "{$datos['id']} <br>";
    echo "{$datos['nombre']} <br>";
    echo "{$datos['correo']} <br>";
    echo "{$datos['telefono']} <br>";
    $datos = $resultado->fetch_assoc();
} */

//4. Cerrar la conexión
$conexion->close();     

function ImprimeDatos($datos)
{
    echo "<div>";
    echo "<h3>Datos de inscripciones</h3> <br>";

    echo "<table width=50%>";
    echo "<tr>";
    echo "<th colspan='5'>Id</th>";
    echo "<th>Nombre</th>";
    echo "<th>Precio</th>";
    echo "</tr>";

    if ($datos->num_rows > 0) {
        echo "<tr>";
        while ($row = $datos->fetch_assoc()) {
            echo "<td colspan='5'>{$row['id_producto']}</td>";
            echo "<td>{$row['nom_producto']}</td>";
            echo "<td>{$row['precio']}</td>";

            echo "<td> <a href=actualizaDatos.php?id={$row['id']}>Modificar</a></td>";
            echo "<td> <a href=mostrarPersona.php?id={$row['id']}>Eliminar</a></td>";
            
            echo "</tr>";
        }
    }else{
        echo "<tr>";
        echo "<th>No hay registros de inscripciones.</th>";
        echo "</tr>";
        //hay cero filas
    }

    echo "</table>";


    echo "</div>";
}

?>