<?php
ob_start();

    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y esta relleno el campo idUsuario y el usuario es de tipo administrador
// Borramos el usuario y mostramos alert y si el usuario de la sesion se intenta borrar a si mismo no lo permite.
    if(isset($_SESSION["usuario"]) && isset($_POST["idUsuario"]) && $_SESSION["usuario"]->getTipoUsuario() == 1){
        $db = new Conectar();
        $borrarUsuario=$db->borrarUsuario();
        if ($borrarUsuario){
            $_SESSION["eliminado"] = "Se ha eliminado correctamente el usuario";
            header("location:gestionUsuarios_controller.php");
        }else{
            $_SESSION["usuarioNoEliminado"] = "No se puede eliminar un usuario a si mismo";
            header("location:gestionUsuarios_controller.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
