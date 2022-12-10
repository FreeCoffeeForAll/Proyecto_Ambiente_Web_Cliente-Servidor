<?php

session_start();

if(!isset($_SESSION['username']) or (!isset($_GET['id']))){
  header("Location: login.php");
}

include './include/conexionDB.php';
$id = $_GET['id'];

$resultado = $conexion->query("SELECT nom_producto, precio, desc_producto, img FROM producto
            where id_producto='$id'");

$datos = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
  <title><?php echo "{$datos['nom_producto']}"?></title>
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

<body class="d-flex flex-column min-vh-100">
  <?php
    include 'include/navbar.php';
  ?>
  <div class="container p-5">
    <h1><?php echo "{$datos['nom_producto']}"?>  <small> <?php echo "{$datos['precio']}"?> </small></h1>
    <div class="row">
      <div class="col-md-4">
        <img src="<?php echo "./img/{$datos['img']}"?>" class="img-fluid">
        <br><br>
        <div class="btn-group text-right" role="group" aria-label="Basic example">
          <a href="homePage.php" class="btn btn-default btn-block">Regresar</a>
          <a href='carrito.php?id=<?= $id ?>' class="btn btn-success btn-block">Comprar</a>
        </div>
      </div>
      <div class="col-md-8">
        <h3><?php echo "{$datos['nom_producto']}"?></h3>
        <hr>
        <p>
          <?php echo "{$datos['desc_producto']}"?>
        </p>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <div class='mt-auto'>
    <br>
    <br>
    <br>
    <footer class="border-top footer text-muted">
      <br>
      <br>
      <div class="container">
        &copy; 2022 | Detalles
      </div>
      <br>
      <br>
    </footer>
  </div>
</body>

</html>