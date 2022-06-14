<?php
ob_start();

    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y esta establecido el idClubDeporte y el usuario es de tipo administrador o colaborador,
// borramos la pista y mostramos alert.
    if(isset($_SESSION["usuario"]) && isset($_POST["idClubDeporte"]) && $_SESSION["usuario"]->getTipoUsuario() == 1 || $_SESSION["usuario"]->getTipoUsuario() == 3){
        $db = new Conectar();
        $borrarPista=$db->borrarPista();
        if ($borrarPista){
            $_SESSION["eliminadoPista"] = "Se ha eliminado correctamente la pista";
            header("location:administrarPistas_controller.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>