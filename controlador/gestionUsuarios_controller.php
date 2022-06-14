<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
    // Si esta establecido el usuario en la sesión y es de tipo administrador listamos los usuarios para gestionarlos.
    if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]->getTipoUsuario() == "1"){
            $db = new Conectar();
            $listarUsuarios=$db->listarUsuarios();
            require_once("../vista/GestionUsuarios.php");
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
