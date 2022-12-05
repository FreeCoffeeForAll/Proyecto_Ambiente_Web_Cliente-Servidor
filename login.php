<?php
session_start();

require('include/conexionDB.php');

if(isset($_SESSION['username'])){
    header("Location: homepage.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION["username"])){
        header("homePage.php");
    }

    $usuario = $_POST['username'];
    $clave = $_POST['password'];

    $sql = $conexion->query("select nom_User, contra, rol_id from usuarios where 
                                    nom_User = '$usuario' and contra = '$clave';");


    while ($row = $sql->fetch_assoc()) {
        if ($row['rol_id'] == 1) {
            $_SESSION["username"] = $usuario;
            header("Location: gestion.php");
            $_SESSION["rol"] = $row['rol_id'];
        } else if ($row['rol_id'] == 2) {
            $_SESSION["username"] = $usuario;
            $_SESSION["rol"] = $row['rol_id'];
            header("Location: homePage.php");
        }
        $row = $sql->fetch_assoc();
    }
    if ($datos = $sql->fetch_assoc()) {
        echo '';
    } else {
        echo 'credenciales invalidas';
    }
}




?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>

<body class="text-center">
    <section>
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <div class="card" style="background: whitesmoke">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4 text-center">Iniciar sesión</h1>
                                <form method="post" action="">
                                    <fieldset>
                                        <!-- <div class="alert alert-danger">                                    
                                    Nombre de usuario o contraseña incorrecto(s).
                                </div>                               -->
                                        <!-- Login Controls -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Nombre de usuario">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Contraseña">
                                        </div>
                                        <hr>
                                        <input type="submit" class="btn btn-success" name='ingresar' value="Ingresar" />
                            </div>
                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>