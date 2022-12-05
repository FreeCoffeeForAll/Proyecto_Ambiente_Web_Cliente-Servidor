<?php 
session_start();

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
</head>

<?php

$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Ocurrio un error al establecer la conexion: {$conexion->connect_error}";
}

$resultado = $conexion->query("select id_Usuario, nom_User, contra, nombre_usuario, apel_User, correo_User, telefono_User, rol_id from usuarios");
if($conexion->error != ''){
    echo "Ocurrio un error al ejecutar la consulta: {$conexion->error}";
}

include('./include/navbar.php');

ImprimeDatos($resultado);

$conexion->close();

function ImprimeDatos($datos){
    echo "<div>";
    echo "<h3>Datos de usuario</h3> <br>";

    echo "<table width=50%>";
    echo "<tr>";
    echo "<th colspan='5'>Nombre</th>";
    echo "<th>Correo</th>";
    echo "<th>Teléfono</th>";
    echo "</tr>";

    if ($datos->num_rows > 0) {
        echo "<tr>";
        while ($row = $datos->fetch_assoc()) {
            echo "<td colspan='5'>{$row['nombre_usuario']}</td>";
            echo "<td>{$row['correo_User']}</td>";
            echo "<td>{$row['telefono_User']}</td>";

            echo "<td> <a href=UserDataUpdate.php?id={$row['id_Usuario']}>Modificar</a></td>";
            echo "<td> <a href=UserShowPerson.php?id={$row['id_Usuario']}>Eliminar</a></td>";
            
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