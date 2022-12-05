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
    <title>Mostrar persona</title>

    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    


</head>
<body>
<form method="post" action="UserDeleteData.php" id='formulario'>
        <input type="text" name="id" id="identificador" value="<?= $_GET['id'] ?>" hidden required>

<?php

//1. Establecer la conexión con el motor de base de datos y seleccionar la base de datos que vamos a utilizar
$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Ocurrió un error al establecer la conexión: {$conexion->connect_error}";
}

//2. Ejecutar la consulta. (seleccionar datos)
$resultado = $conexion->query("select id_Usuario, nom_User, contra, nombre_usuario, apel_User, correo_User, telefono_User, rol_id from usuarios where id_Usuario = {$_GET['id']}");

if($conexion->error != ''){
    echo "Ocurrió un error al ejecutar la consulta: {$conexion->error}";
}

//3. Mostrar los resultados de la consulta.

$datos = $resultado->fetch_assoc();

//4. Cerrar la conexión
$conexion->close();   
?>

        <div>
            <label for="nombre">Nombre:</label>
            <p><?php echo "<strong>{$datos['nombre_usuario']}</strong>"; ?></p>
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <p><?php echo "<strong>{$datos['apel_User']}</strong>"; ?></p>
        </div>
        <div>
            <label for="correo">Correo electrónico:</label>
            <p><?php echo "<strong>{$datos['correo_User']}</strong>"; ?></p>
        </div>
        <div>
            <label for="usuario">Usuario:</label>
            <p><?php echo "<strong>{$datos['nom_User']}</strong>"; ?></p>
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <p><?php echo "<strong>{$datos['contra']}</strong>"; ?></p>
        </div>
        <div>
            <label for="role">Role:</label>
            <p><?php echo "<strong>{$datos['rol_id']}</strong>"; ?></p>
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <p><?php echo "<strong>{$datos['telefono_User']}</strong>"; ?></p>
        </div>

        <button type="submit">Eliminar datos</button>
    </form>
    <script src="js/manejoCookies.js"></script>
    <script src="js/validacionElimina.js"></script>
</body>
</html>