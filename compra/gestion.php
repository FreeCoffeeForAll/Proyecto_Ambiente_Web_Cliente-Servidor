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
									<li><a class="dropdown-item" href="../bicicleta/getAllByCategoria.php">Mountain Bike</a></li>
									<li><a class="dropdown-item">BMX</a></li>
									<li><a class="dropdown-item">Niños</a></li>
									<li><a class="dropdown-item">Ruta</a></li>                          
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../bicicleta/misBicicletas.php">Mis bicicletas</a>
							</li>   
							<li class="nav-item">
								<a class="nav-link" href="../bicicleta/gestion.php">Gestionar bicicletas</a>
							</li> 
							<li class="nav-item">
								<a class="nav-link" href="./gestion.php">Gestionar compras</a>
							</li>                        
						</ul>                                                                      
					</div>
				</div>
			</nav>
		</header>
        <div class="container p-5">
            <div class="d-flex bd-highlight">                
                <div class="p-2 w-100 bd-highlight">
                    <div class="card">                            
                        <div class="card-header">
                            <a class="btn btn-default" href="#" disabled>Gestión compras</a>                           
                        </div>                
                        <div class="card-body">                    
                            <div class="p-4">
                                <table class="table table-borderless" id="comprasTable">
                                    <thead>
                                        <tr>   
                                            <th scope="col" class='text-center'>Id </th>                                            
                                            <th scope="col" class='text-center'>Nombre del usuario </th>
                                            <th scope="col" class="text-center">Bicicleta</th>
                                            <th scope="col" class="text-center">Fecha de compra </th>                                                                              
                                            <th scope="col" class="text-center"> </th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>                                    
                                        <tr>
                                            <td class="text-center align-middle"></td>                                               
                                            <td class="text-center align-middle"></td>
                                            <td class="text-center align-middle"></td>  
                                            <td class="text-center align-middle"></td>                                                                                  
                                            <td class="text-center align-middle">
                                                <div class="row">                                                                                                
                                                    <div class="col-6">                                                                                                                                                 
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#example_modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                            </svg>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="example_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar compra</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    ¿Estás seguro de que deseas eliminar esta compra?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-success">Confirmar</a>   
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>                                                                                
                                            </td>                                  
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
    </body>
</html>
                