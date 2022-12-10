<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: homePage.php");
}

$total = 0;
$cantidad = 0;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Carrito</title>
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
    <div class="container-xxl">
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-default" disabled>Carrito</a>
                    </div>
                    <div class="card-body">
                        <div class="p-3">
                            <table class="table table-borderless" id="bicicletasTable">
                                <?php
                                if (!isset($_SESSION['cart']) || $_SESSION['cart']==null) {
                                    echo '<div class="alert alert-danger">                                    
                                                    No hay elementos en el carrito.
                                            </div>';
                                } else {
                                    echo ' 
                                   <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Nombre </th>
                                        <th scope="col" class="text-center">Imagen</th>
                                        <th scope="col" class="text-center">Marca </th>
                                        <th scope="col" class="text-center">Precio </th>
                                        <th scope="col" class="text-center">Cantidad </th>
                                        <th scope="col" class="text-center"> </th>
                                    </tr>
                                </thead>
 ';
                                }
                                ?>
                                <tbody>
                                    <tr>
                                        <?php
                                        if (!isset($_SESSION['cart'])) {
                                            echo '';
                                        } else {
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $key => $valor) {
                                                    $total = $total + $valor['precio'];
                                                    echo "<td class='text-center align-middle'>{$valor['nombre']}</td>";
                                                    echo "<td class='text-center align-middle'><img src='./img/{$valor['imagen']}' width='176' height='150'/> </td>";
                                                    echo "<td class='text-center align-middle'>{$valor['marca']}</td>";
                                                    echo "<td class='text-center align-middle'>$ {$valor['precio']}</td>";
                                                    echo "<td class='text-center align-middle'>
                                                        <form action='actualizaPrecio.php' method='post'>
                                                            <div class='form-outline'>
                                                                <input style='width: 70px' min=1 max=5 value=1 type='number' id='cantidad' class='form-control' />
                                                            </div>
                                                        </form>
                                                    </td>";
                                                    echo '<td class="text-center align-middle">';
                                                    echo "      <form method='post' action='carritoBorrar.php?id={$valor['nombre']}'>";
                                                    echo '          <div class="col-6">';
                                                    echo '              <button class="btn btn-danger" name="eliminar">';
                                                    echo '                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"';
                                                    echo '                  fill="currentColor" class="bi bi-trash3-fill"';
                                                    echo '                  viewBox="0 0 16 16">';
                                                    echo '                  <path';
                                                    echo '                      d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />';
                                                    echo '                  </svg>';
                                                    echo '              </button>';
                                                    echo '          </div>';
                                                    echo '      </form>';
                                                    echo '  </td>';
                                                    echo '<tr>';
                                                }
                                            }
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn-group float-end bg-primary m-1" role="group" aria-label="Basic example">
                                <a href="homePage.php" class="btn btn-default text-light">Volver</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-lg-5">
                <div class="p-2 w-100 bd-highlight">
                    <div class="card">
                        <div class="card-header">
                            <h5>Pago</h5>
                        </div>
                        <div class="card-body">
                            <h3>Precio Total</h3>
                            <hr>
                            <?php echo "<h5 class='text-end' id='precioTotal'>$ {$total}</h5>"; ?>
                            <form action="procesaCompra.php" method="post">
                                <input type="hidden" name="total" value="<?= $total ?>">
                                <button class="btn bg-primary text-light">Pagar</input>
                            </form>
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
                           ent) ion() {
            if ($({
                asTable').DataTable({
                                dom: 'Bfrt                                     'iDisplayLength': 10,
                        "language":                                                       //cd                    .n                ins/.es-ES.json"
            },
                    });
                }
            });
    </script>
</body>