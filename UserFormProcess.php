<?php

function recoge($var, $m ="")
{
    if(!isset($_POST[$var])){

        $tmp = (is_array($m)) ? []:"";

    }elseif(!is_array($_POST[$var])){

        $tmp = trim(htmlspecialchars($_POST[$var], ENT_QUOTES, "UTF-8"));

    }else{

        $tmp=$_POST[$var];
        array_walk_recursive($tmp, function(&$valor){
            $valor=trim(htmlspecialchars($valor. ENT_QUOTES, "UTF-8"));

        });
    }
return $tmp;
}

$nombre = recoge("nombre");
$apellido = recoge("apellido"); 
$correo = recoge("correo");
$usuario = recoge("usuario");
$contrasena = recoge("contrasena");
$role = recoge("role");
$telefono = recoge("telefono");

$nombreOK = false;
$apellidoOK = false;
$correoOK = false;
$usuarioOK = false;
$contrasenaOK = false;
$roleOK = false;
$telefonoOK = false;

if($nombre == ""){
    echo"<p>No se digito el nombre de la persona</p><br>";
    echo "\n";
}else{
    $nombreOK = true;
}



$apellidoOK = true;
$correoOK = true;
$usuarioOK = true;
$contrasenaOK = true;
$roleOK = true;
$telefonoOK = true;

if($usuarioOK &&  $contrasenaOK && $nombreOK && $apellidoOK && $correoOK  && $telefonoOK && $roleOK){
    require_once 'UserPerson.php';
    if(IngresarPersona($usuario, $contrasena, $nombre, $apellido, $correo, $telefono, $role))
    {
        header("Location: UserDataQuery.php");
    }
}

?>