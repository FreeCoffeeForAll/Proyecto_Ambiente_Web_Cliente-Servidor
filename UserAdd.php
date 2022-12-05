<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("location: login.php");
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Usuarios</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
</head>

<body>



  <?php
  include('./include/navbar.php');
  ?>





  <form method="post" action="UserFormProcess.php" id='formulario'>
    <div>
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" placeholder="Digita tú nombre ">
    </div>
    <div>
      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" id="apellido" placeholder="Digita tú apellido ">
    </div>
    <div>
      <label for="correo">Correo electrónico:</label>
      <input type="email" name="correo" id="correo" placeholder="Digita tú correo">
    </div>
    <div>
      <label for="usuario">Usuario:</label>
      <input type="text" name="usuario" id="usuario" placeholder="Digita tú usuario">
    </div>
        <div>
      <label for="contrasena">Contraseña:</label>
      <input type="text" name="contrasena" id="contrasena" placeholder="Digita tú contraseña">
    </div>
    <div>
      <label for="role">Role:</label>
      <input type="number" name="role" id="role" placeholder="Digita el role de usuario">
    </div>
    <div>
      <label for="telefono">Teléfono:</label>
      <input type="number" name="telefono" id="telefono" placeholder="Digita el número de teléfono sin guiones ni espacios">
    </div>

    <button type="submit">Procesar datos</button>
  </form>
  
  <script src="js/manejoCookies.js"></script>
  <script src="js/index.js"></script>


</body>

</html>



<!-- INDEX SIMULATION -->