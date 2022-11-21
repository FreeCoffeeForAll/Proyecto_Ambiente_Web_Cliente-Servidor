<!DOCTYPE html>
<html>
    <head>
        <title>Inicio | *NombrePágina*</title>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- DataTables -->
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>        
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>        
    </head>
    <body class="d-flex flex-column min-vh-100"> 
      	<header>
            <nav class="navbar navbar-expand-lg bg-light">
				<div class="container-fluid">
					<a href="../homePage.php">
						<img src="../img/logo.png" class='logo' alt="alt" width="175px" height="100px"/>
					</a>  
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page">Inicio</a>
							</li>                     
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Categorías
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="./getAllByCategoria.php">Mountain Bike</a></li>
									<li><a class="dropdown-item">BMX</a></li>
									<li><a class="dropdown-item">Niños</a></li>
									<li><a class="dropdown-item">Ruta</a></li>                          
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./misBicicletas.php">Mis bicicletas</a>
							</li>   
							<li class="nav-item">
								<a class="nav-link" href="./gestion.php">Gestionar bicicletas</a>
							</li> 
							<li class="nav-item">
								<a class="nav-link" href="../compra/gestion.php">Gestionar compras</a>
							</li>                        
						</ul>                                                                      
					</div>
				</div>
			</nav>
		</header>
        <div class="container p-5">
            <div class="d-flex bd-highlight">                
                <div class="p-2 w-100 bd-highlight text-center">
                    <h5>*Nombre de categoría*</h5>
                    <div class="row p-2">
                        <div class="card m-2" style="width: 18rem;">
                            <img src="" class="card-img-top" width=175px height=140px style="border-radius: 10px">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más...</a>
                            </div>
                        </div>
                        <div class="card m-2" style="width: 18rem;">
                            <img src="" class="card-img-top" width=175px height=140px style="border-radius: 10px">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más...</a>
                            </div>
                        </div>
                        <div class="card m-2" style="width: 18rem;">
                            <img src="" class="card-img-top" width=175px height=140px style="border-radius: 10px">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más...</a>
                            </div>
                        </div>
                        <div class="card m-2" style="width: 18rem;">
                            <img src="" class="card-img-top" width=175px height=140px style="border-radius: 10px">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más...</a>
                            </div>
                        </div>
                        <div class="card m-2" style="width: 18rem;">
                            <img src="" class="card-img-top" width=175px height=140px style="border-radius: 10px">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más...</a>
                            </div>
                        </div>
                        <div class="card m-2" style="width: 18rem;">
                            <img src="" class="card-img-top" width=175px height=140px style="border-radius: 10px">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Ver más...</a>
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
            <footer class="border-top footer text-muted" >
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
