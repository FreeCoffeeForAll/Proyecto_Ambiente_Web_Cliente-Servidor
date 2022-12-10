<?php
require './include/conexionDB.php';
session_start();

if(!isset($_SESSION['username']) or $_SESSION['rol'] != 1){
    header("location: homepage.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registro Bicicleta</title>
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
        include "./include/navbar.php";
    ?>

   <div class="container p-5">
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight">
                <div class="card">
                    <div class="card-header">
                        Registrar bicicleta
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="procesar.php">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="categoria" class="form-label">Categoría</label>
                                        <select class="form-control form-control-sm col-md-6" name="categoria" id="categoria" required>
                                            <option value="1">Mountain Bike</option>
                                            <option value="2">BMX</option>
                                            <option value="3">Ruta</option>
                                            <option value="4">Niños</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="marca" class="form-label">Marca</label>
                                        <input type="text" class="form-control" name="marca" placeholder="Marca" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputNombre" class="form-label">Nombre</label>
                                        <input type="text" id="inputNombre" class="form-control" name="nombre" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputDescripcion" class="form-label">Descripción</label>
                                        <textarea name="descripcion" id="inputDescripcion" cols="10" rows="3"
                                            class="form-control" maxlength="90" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputPrecio" class="form-label">Precio</label>
                                        <input type="number" id="inputPrecio" class="form-control" name="precio" min="0"
                                            max="1000000" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputCantidad" class="form-label">Cantidad</label>
                                        <input type="number" id="inputCantidad" class="form-control" name="cantidad"
                                            min="0" max="1000" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-text">
                                        <label for="inputImagen" class="form-label">Imagen</label>
                                        <input type="file" id="inputImagen" class="form-control" name="image"
                                            accept="image/png, image/jpeg">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="btn-group float-end" role="group" aria-label="Basic example">
                                <a href="./gestion.php"class="btn btn-default">Volver</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Guardar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Registrar bicicleta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas registrar esta bicicleta?
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

</html>