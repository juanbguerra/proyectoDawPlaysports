<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
//Si el usuario de la sesión está establecido y si es de tipo administrador y colaborador puede gestionar las pistas si no te redirige a index.
    if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]->getTipoUsuario() == 1 || $_SESSION["usuario"]->getTipoUsuario() == 3){
            $db = new Conectar();
            $listarClubDeportivo=$db->listarClubDeportivo();
            require_once("../vista/GestionPistas.php");
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
