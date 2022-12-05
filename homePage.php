<?php 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bici Tienda</title>
</head>

<body>
    
    <?php
        include('./include/navbar.php');
    ?>

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading">BiciTienda</h1>
            <p class="lead">Tienda de bicicletas de confianza, contamos con una variedad de bicicletas con distintas
                categorías para el ajuste de cada persona.
                Descubre los diferentes productos disponibles!</p>
        </div>
    </section>


    <div class="contiainer">
        <div class="row px-5 m-2">
            <?php 
                require("./include/conexionDB.php");
                $resultado = $conexion->query("select id_producto, nom_producto, precio, desc_producto, img from producto");

                $datos = $resultado->fetch_assoc();
                while($datos != null){
                    echo '  <div class="card m-2 py-4" style="width: 18rem;">';
                    echo '    <img class="card-img-top"';
                    echo "        src='./img/{$datos['img']}' ";
                    echo '        alt="Card image cap">';
                    echo '    <div class="card-body">';
                    echo "        <a class='link-primary' href='details.php?id={$datos['id_producto']}'> <h5 class='card-title'>{$datos['nom_producto']}</h5></a>";
                    echo "        <p class='card-text'>{$datos['desc_producto']}</p>";
                    echo "        <h5>$ {$datos['precio']}</h5>";
                    echo "        <a href='carrito.php?id={$datos['id_producto']}'";
                    echo "        <input name='add' type='submit' value='Añadir' class='btn btn-success align-self-end'";
                    echo '            style="position: absolute; right: 0; bottom: 0; margin: auto 10px 10px auto;">Añadir</input></a>';
                    echo '    </div>';
                    echo '  </div>';
                    
                    $datos = $resultado->fetch_assoc();
                }
            ?>

        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>