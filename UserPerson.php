<?php

require_once "UserConexion.php";

if(!isset($_SESSION['username']) or $_SESSION['rol'] != 1){
    header("location: homePage.php");
}

function IngresarPersona($pUsuario, $pContrasena, $pNombre, $pApellido, $pCorreo, $pTelefono, $pRole)
{
    $retorno = false;
    $Conexion = Conecta();

    if(mysqli_set_charset($Conexion, "utf8")){

        $stmt = $Conexion->prepare("Insert into usuarios(nom_User, contra, nombre_usuario, apel_User, correo_User, telefono_User, rol_id) values (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $iUsuario, $iContrasena, $iNombre, $iApellido, $iCorreo, $iTelefono, $iRole);

        $iUsuario = $pUsuario;
        $iContrasena = $pContrasena;
        $iNombre = $pNombre;
        $iApellido = $pApellido;
        $iCorreo = $pCorreo;                       
        $iTelefono = $pTelefono;
        $iRole = $pRole;

        if($stmt->execute()){
            $retorno = true;
        }
    }

    Desconecta($Conexion);
    return $retorno;
}

//PERSONA SIMULATION

