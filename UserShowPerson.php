<?php
session_start();

if (!isset($_SESSION['username']) or $_SESSION['rol'] != 1) {
  header("location: homePage.php");
}

include('include/conexionDB.php');
$id = $_GET['id'];

$resultado = $conexion->query("SELECT * FROM USUARIOS WHERE id_usuario = $id");

$datos = $resultado->fetch_assoc();

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

  <?php include('include/navbar.php') ?>

  <div class="container p-5">
    <div class="d-flex bd-highlight">
      <div class="p-2 w-100 bd-highlight">
        <div class="card">
          <div class="card-header">
            Registro
          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
              action="UserDeleteData.php">
              <input type="hidden" name="id" value="<?= $id ?>">
              <div class="row">
                <div class="col-6">
                  <div class="form-text">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" value="<?= $datos['nombre_usuario']  ?>" class="form-control" name="nombre" placeholder="Inserte Nombre" disabled>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-text">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input  value="<?= $datos['apel_User'] ?>" type="text" class="form-control" name="apellido" placeholder="Digite Apellido" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-text">
                    <label for="apellido" class="form-label">Correo</label>
                    <input value="<?= $datos['correo_User'] ?>" type="text" class="form-control" name="correo" placeholder="Digite Correo" disabled>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-text">
                    <label for="usuario" class="form-label">Nombre Usuario</label>
                    <input value="<?= $datos['nom_User'] ?>" type="text" name="usuario" id="usuario" placeholder="Digite Nombre de Usuario"
                      class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-text">
                    <label for="rol" class="form-label">Rol</label>
                    <input type="number" name="rol" id="rol" placeholder="Rol" value="<?= $datos['rol_id'] ?>" min=1 max=2 class="form-control" disabled>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-text">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="number"  name="telefono" id="telefono" value="<?= $datos['telefono_User'] ?>"
                      placeholder="Digita el número de teléfono sin guiones ni espacios" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <br>
              <hr>
              <br>
              <div class="btn-group float-end" role="group" aria-label="Basic example">
                <a href="gestion.php" class="btn btn-default">Volver</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar bicicleta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar este usuario?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                      </div>
                    </div>
                  </div>
                </div>
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
<?php $conexion->close(); ?>

</html>