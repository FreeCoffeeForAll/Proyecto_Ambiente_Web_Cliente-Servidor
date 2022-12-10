<?php
session_start();

if (isset($_SESSION['rol']) == 2) {
  header("location: homePage.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Inicio | *NombrePágina*</title>
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
  if (isset($_SESSION['rol']) == 1){
    include('include/navbar.php');
  }
   
  ?>

  <div class="container p-5">
    <div class="d-flex bd-highlight">
      <div class="p-2 w-100 bd-highlight">
        <div class="card">
          <div class="card-header">
            Registro
          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="UserFormProcess.php">

              <div class="row">
                <div class="col-6">
                  <div class="form-text">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Inserte Nombre" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-text">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" placeholder="Digite Apellido" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-text">
                    <label for="apellido" class="form-label">Correo</label>
                    <input type="text" class="form-control" name="correo" placeholder="Digite Correo" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-text">
                    <label for="usuario" class="form-label">Nombre Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Digite Nombre de Usuario"
                      class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-text">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña"
                      class="form-control" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-text">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="number" name="telefono" id="telefono"
                      placeholder="Digita el número de teléfono sin guiones ni espacios" class="form-control" required>
                  </div>
                </div>
              </div>
              <br>
              <hr>
              <br>
              <div class="btn-group float-end" role="group" aria-label="Basic example">
                <a href="gestion.php" class="btn btn-default">Volver</a>
                <!-- Button trigger modal -->
                <button type="submit" class="btn btn-primary">
                  Registrar
                </button>

                
              </div>
            </form>
          </div>
        </div>
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
        &copy; 2022 | *Nombre de página*
      </div>
      <br>
      <br>
    </footer>
  </div>
</body>

</html>