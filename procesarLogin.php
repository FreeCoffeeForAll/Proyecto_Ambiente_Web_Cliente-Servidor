<?php

if (!isset($_SESSION['username']) or $_SESSION['rol'] != 1) {
  header("location: login.php");
}

if (!empty($_POST['ingresar'])) {
    if (empty($_POST['username']) and empty($_POST['password'])) {
        echo ' <div class="alert alert-danger">Los campos están vacíos</div>';
    } else {
        $usuario = $_POST['username'];
        $clave = $_POST['password'];

        $sql = $conexion->query("select nom_User, contra from usuarios where 
                                    nom_User = '$usuario' and contra = '$clave';");
        if ($datos = $sql->fetch_assoc()) {
            header("Location: homePage.php");
        } else {
            echo ' <div class="alert alert-danger">Credenciales inválidas</div>';

        }
    }
}

?>