<?php

session_start();

if (!isset($_SESSION['username']) or $_SESSION['rol'] != 1) {
    header("location: homePage.php");
}

require('include/conexionDB.php');

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

    <?php require('include/navbar.php'); ?>
    <div class="container p-5">
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight">
                <div class="card">
                    <div class="card-header">
                        <h5> Gestión compras</h5>
                    </div>
                    <div class="card-body">
                        <div class="p-4">
                            <table class="table table-borderless" id="comprasTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class='text-center'>Id Compra</th>
                                        <th scope="col" class='text-center'>Id Productos</th>
                                        <th scope="col" class="text-center">Precio</th>
                                        <th scope="col" class="text-center">Estado</th>
                                        <th scope="col" class="text-center"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $resultado = $conexion->query("SELECT * FROM compras");

                                        $datos = $resultado->fetch_assoc();
                                        while($datos != null){
                                            echo "
                                            <td class='text-center align-middle'>{$datos['id_compra']}</td>
                                            <td class='text-center align-middle'>{$datos['id_productos']}</td>
                                            <td class='text-center align-middle'>{$datos['total_precio']}</td>  
                                            <td class='text-center align-middle'>{$datos['estado']}</td>                                                                                  
                                            ";
                                            echo '
                                        <td class="text-center align-middle">
                                            <div class="row">
                                                <div class="col-6">';
                                            echo"        <a href='editCompra.php?id={$datos['id_compra']}' class='btn btn-warning'>";
                                            echo'            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                            <tr>
                                                ';
                                            $datos = $resultado->fetch_assoc();
                                        }

                                            ?>
                                   </tr>
                                </tbody>
                            </table>
                        </div>
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
    <script>
        $(document).ready(function () {
            if ($('#comprasTable')) {
                $('#comprasTable').DataTable({
                    dom: 'Bfrtip',
                    'iDisplayLength': 10,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                    },
                });
            }
        });
    </script>

    <?php $conexion->close(); ?>
</body>

</html>