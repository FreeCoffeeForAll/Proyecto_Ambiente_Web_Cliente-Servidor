<?php

$id = $_GET['id'];

$conexion = new mysqli('localhost', 'root', '', 'tienda');

if ($conexion->connect_error != null) {
    echo "Error al conectar {$conexion->connect_error}";
}

$resultado = $conexion->query("select id_producto, nom_producto, marca, precio, cantidad, desc_producto, 
                            id_categoria from producto where id_producto = $id");

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
    <header>
        <nav class="navbar navbar-dark navbar-expand-md bg-dark">
            <a class="navbar-brand mb-0 h1">
                <img class="d-inline-block mx-1" src="https://icucycle.com/wp-content/uploads/2018/05/bike-white-hi.png"
                    width="60" height="30" />
                BiciTienda
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./bicicleta/misBicicletas.php">Mis bicicletas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./bicicleta/gestion.php">Gestionar bicicletas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./compra/gestion.php">Gestionar compras</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorias
                </button>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Montaña</a></li>
                    <li><a class="dropdown-item" href="#">BMX</a></li>
                    <li><a class="dropdown-item" href="#">Niños</a></li>
                </ul>
            </div>
            <button data-bs-target="#navbarNav" aira-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation" type="button" class="navbar-toggler" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end mr-2" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="#" class="nav-link active">Logout</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cart" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <div class="container p-5">
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight">
                <div class="card">
                    <div class="card-header">
                        Modificar bicicleta
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data"
                            action="editFormulario.php?id=<?= $datos['id_producto'] ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="categoria" class="form-label">Categoría</label>
                                        <select class="form-control form-control-sm col-md-6" id="categoria" required>
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
                                        <input type="text" class="form-control" name="marca" placeholder="Marca"
                                            value="<?= $datos['marca'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputNombre" class="form-label">Nombre</label>
                                        <input type="text" id="inputNombre" class="form-control" name="nombre"
                                            value="<?= $datos['nom_producto'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputDescripcion" class="form-label">Descripción</label>
                                        <textarea name="descripcion" id="inputDescripcion" cols="10" rows="3"
                                            class="form-control" maxlength="90"
                                            required><?= $datos['desc_producto'] ?> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputPrecio" class="form-label">Precio</label>
                                        <input type="number" id="inputPrecio" class="form-control" name="precio" min="0"
                                            max="1000000" value="<?= $datos['precio'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-text">
                                        <label for="inputCantidad" class="form-label">Cantidad</label>
                                        <input type="number" id="inputCantidad" class="form-control" name="cantidad"
                                            min="0" max="1000" value="<?= $datos['cantidad'] ?>" required>
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
                                <a class="btn btn-default">Volver</a>
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