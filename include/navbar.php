<header>
    <nav class="navbar navbar-dark navbar-expand-md bg-dark">
        <a class="navbar-brand mb-0 h1" href="homePage.php">
            <img class="d-inline-block mx-1" src="https://icucycle.com/wp-content/uploads/2018/05/bike-white-hi.png"
                width="60" height="30" />
            BiciTienda
        </a>
        <ul class="navbar-nav">
            <?php
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol'] == 1) {
                    echo '<li class="nav-item">';
                    echo '    <a class="nav-link" href="gestion.php">Gestionar bicicletas</a>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
 
       <ul class="navbar-nav">
            <?php
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol'] == 1) {
                    echo '<li class="nav-item">';
                    echo '    <a class="nav-link" href="gestionCompra.php">Gestionar Compras</a>';
                    echo '</li>';

                    echo '<li class="nav-item">';
                    echo '    <a class="nav-link" href="UserDataQuery.php">Gestionar Usuarios</a>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
        <button data-bs-target="#navbarNav" aira-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation" type="button" class="navbar-toggler" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end mr-2" id="navbarNav">
            <?php
            if (!isset($_SESSION['rol'])) {
                echo '                 <ul class="navbar-nav">';
                echo '                    <li class="nav-item active">';
                echo '                        <a href="userAdd.php" class="nav-link active">Registro</a>';
                echo '                    </li>';
                echo '                  <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a href="login.php" class="nav-link active">Login</a>
                                            </li>
                ';

            } elseif (isset($_SESSION['rol'])) {
                echo '            <ul class="navbar-nav">';
                echo '                <li class="nav-item active">';
                echo '                    <a href="logout.php" class="nav-link active">Logout</a>';
                echo '                </li>';
                echo '                <li class="nav-item active">';
                echo '                    <a href="miCarrito.php" class="nav-link">';
                echo '                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"';
                echo '                            class="bi bi-cart" viewBox="0 0 16 16">';
                echo '                            <path';
                echo '                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />';
                echo '                        </svg>';
                echo '                    </a>';
                echo '                </li>';
                echo '            </ul>';
            }
            ?>

        </div>
    </nav>
</header>