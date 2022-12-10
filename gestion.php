<?php

session_start();
if(!isset($_SESSION['username']) or $_SESSION['rol'] != 1){
    header("location: homepage.php");
}

require('include/conexionDB.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Gestión Bicicleta</title>
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

    <?php 
        include "./include/navbar.php";
    ?>
   <div class="container p-5">
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-default" href="#" disabled>Gestión bicicletas</a>
                        <div class="btn-group float-end" role="group" aria-label="Basic example">
                            <a class="btn btn-primary" href="./create.php">Registrar bicicleta</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="p-4">
                            <table class="table table-borderless" id="bicicletasTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class='text-center'>Id</th>
                                        <th scope="col" class='text-center'>Imagen</th>
                                        <th scope="col" class="text-center">Nombre</th>
                                        <th scope="col" class="text-center">Marca</th>
                                        <th scope="col" class="text-center">Precio</th>
                                        <th scope="col" class="text-center">Cantidad</th>
                                        <th scope="col" class="text-center">desc_producto</th>
                                        <th scope="col" class="text-center">Id Categoria</th>
                                        <th scope="col" class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $resultado = $conexion->query("select id_producto, nom_producto, marca, precio, cantidad, desc_producto, 
                                        id_categoria, img from producto");


                                        $datos = $resultado->fetch_assoc();
                                        while ($datos != null) {
                                            echo "<td class='text-center align-middle'>{$datos['id_producto']}</td>";
                                            echo "<td class='text-center align-middle'><img src='./img/{$datos["img"]}' width='160' height='150'/> </td>";
                                            echo "<td class='text-center align-middle'>{$datos['nom_producto']}</td>";
                                            echo "<td class='text-center align-middle'>{$datos['marca']}</td>";
                                            echo "<td class='text-center align-middle'>{$datos['precio']}</td>";
                                            echo "<td class='text-center align-middle'>{$datos['cantidad']}</td>";
                                            echo "<td class='text-center align-middle'>{$datos['desc_producto']}</td>";
                                            echo "<td class='text-center align-middle'>{$datos['id_categoria']}</td>";

                                            echo '<td class="text-center align-middle">';
                                            echo '    <div class="row">';
                                            echo '        <div class="col-6">';
                                            echo "           <a class='btn btn-warning' href='edit.php?id={$datos['id_producto']}'>";
                                            echo '                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"';
                                            echo '                    fill="currentColor" class="bi bi-pencil-square"';
                                            echo '                    viewBox="0 0 16 16">';
                                            echo '                    <path';
                                            echo '                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />';
                                            echo '                    <path fill-rule="evenodd"';
                                            echo '                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />';
                                            echo '                </svg>';
                                            echo '            </a>';
                                            echo '        </div>';
                                            echo '       <div class="col-6">';
                                            echo '            <!-- Button trigger modal -->';
                                            echo "            <a href='mostrarBici.php?id={$datos['id_producto']}'>";
                                            echo '            <button type="button" class="btn btn-danger"';
                                            echo '                data-bs-target="#example_modal">';
                                            echo '                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"';
                                            echo '                    fill="currentColor" class="bi bi-trash3-fill"';
                                            echo '                    viewBox="0 0 16 16">';
                                            echo '                    <path';
                                            echo '                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />';
                                            echo '                </svg>';
                                            echo '            </button>';
                                            echo "               </a>";
                                            echo '        </div>';
                                            echo '    </div>';
                                            echo '<tr>';

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
            if ($('#bicicletasTable')) {
                $('#bicicletasTable').DataTable({
                    dom: 'Bfrtip',
                    'iDisplayLength': 10,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                    },
                });
            }
        });
    </script>
</body>
<?php $conexion->close(); ?>
</html>