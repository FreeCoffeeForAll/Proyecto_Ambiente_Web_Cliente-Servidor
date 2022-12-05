<?php

//1. Establecer la conexión con el motor de base de datos y seleccionar la base de datos que vamos a utilizar
$conexion = new mysqli('localhost', 'root', '', 'tienda');

if($conexion->connect_error != null){
    echo "Ocurrió un error al establecer la conexión: {$conexion->connect_error}";
}

//2. Ejecutar la consulta. (Ingresar datos)
$conexion->query("update usuarios set nombre_usuario = '{$_POST['nombre']}',
                                        apel_User = '{$_POST['apellido']}',
                                        correo_User = '{$_POST['correo']}',
                                        nom_User = '{$_POST['usuario']}',
                                        contra = '{$_POST['contrasena']}',
                                        rol_id = '{$_POST['role']}',
                                        telefono_User = '{$_POST['telefono']}' 
                                        where id_Usuario = '{$_POST['identificador']}'");

if($conexion->error != ''){
    echo "Ocurrió un error al ejecutar la consulta: {$conexion->error}";
}

//3. Cerrar la conexión
$conexion->close();                   

header("Location: UserDataQuery.php");

?>


