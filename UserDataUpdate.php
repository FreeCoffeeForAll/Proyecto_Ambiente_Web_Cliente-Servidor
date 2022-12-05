<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar formulario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>

    <?php
    include('./include/navbar.php');
    ?>

    <form method="post" action="UserFormUpdate.php">
        <input type="text" name="identificador" id="identificador" value="<?= $_GET['id'] ?>" hidden required>

        <?php

        //1. Establecer la conexión con el motor de base de datos y seleccionar la base de datos que vamos a utilizar
        $conexion = new mysqli('localhost', 'root', '', 'tienda');

        if ($conexion->connect_error != null) {
            echo "Ocurrió un error al establecer la conexión: {$conexion->connect_error}";
        }

        //2. Ejecutar la consulta. (seleccionar datos)
        $resultado = $conexion->query("select id_Usuario, nom_User, contra, nombre_usuario, apel_User, correo_User, telefono_User, rol_id from usuarios where id_Usuario = {$_GET['id']}");

        if ($conexion->error != '') {
            echo "Ocurrió un error al ejecutar la consulta: {$conexion->error}";
        }

        //3. Mostrar los resultados de la consulta.

        $datos = $resultado->fetch_assoc();

        //4. Cerrar la conexión
        $conexion->close();
        ?>

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Digita tú nombre" value=" <?= $datos['nombre_usuario'] ?> ">
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" placeholder="Digita tú apellido " value="<?= $datos['apel_User'] ?>">
        </div>
        <div>
            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" id="correo" placeholder="Digita tú correo" value="<?= $datos['correo_User'] ?>">
        </div>
        <div>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Digita tú usuario" value="<?= $datos['nom_User'] ?>">
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <input type="text" name="contrasena" id="contrasena" placeholder="Digita tú contraseña" value="<?= $datos['contra'] ?>">
        </div>
        <div>
            <label for="role">Role:</label>
            <input type="number" name="role" id="role" placeholder="Digita el role de usuario" value="<?= $datos['rol_id'] ?>">
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="number" name="telefono" id="telefono" placeholder="Digita el número de teléfono sin guiones ni espacios" value="<?= $datos['telefono_User'] ?>">
        </div>

        <button type="submit">Procesar datos</button>
    </form>
</body>

</html>