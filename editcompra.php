<?php
session_start();

if (!isset($_SESSION['username']) or $_SESSION['rol'] != 1) {
    header("location: homePage.php");
}

include('include/conexionDB.php');

$id = $_GET['id'];

$resultado = $conexion->query("SELECT * FROM compras where id_compra = $id");

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
                        Modificar bicicleta
                    </div>
                    <div class="card-body">
                        <form method="POST" action="procesarCompra.php">
                            <input type="hidden" name="id" id="id" value="<?= $id ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="estado" class="form-label">Estado</label>
                                        <select class="form-control form-control-sm col-md-6" name="estado" id="estado" required>
                                            <option >Enviado</option>
                                            <option>Entregado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputPrecio" class="form-label">Precio</label>
                                        <input type="number" id="inputPrecio" class="form-control" name="precio" min="0"
                                            max="1000000" value="<?= $datos['total_precio'] ?>" required>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="btn-group float-end" role="group" aria-label="Basic example">
                                <a href="gestionCompra.php" class="btn btn-default">Volver</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Guardar cambios
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modificar bicicleta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas guardar los cambios?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancelar</button>
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