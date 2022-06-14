<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y esta establecido el campo permisos y el usuario es de tipo administrador
//Modificamos el tipo de usuario de ese usuario en concreto y mandamos alert.
    if(isset($_SESSION["usuario"]) && isset($_POST["permisos"])){
        if($_SESSION["usuario"]->getTipoUsuario() == "1"){
            $db = new Conectar();
            $modificarUsuarioTipo=$db->modificarUsuariosTipo();
            if ($modificarUsuarioTipo){
                $_SESSION["usuarioTipoModificado"] = "Se ha modificado el tipo de usuario";
                header("location:gestionUsuarios_controller.php");
            }else{
                $_SESSION["usuarioTipoNoModificado"] = "No se puede modificar el tipo de usuario a si mismo";
                header("location:gestionUsuarios_controller.php");
            }
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
