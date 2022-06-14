<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    session_start();
    require_once("../modelo/Usuario_model.php");
    // Si esta establecido el usuario en la sesión listamos las reservas que tiene pendientes pasandole el idUsuario del usuario de la sesión logueado
    if(isset($_SESSION["usuario"])){
        $db = new Conectar();
        $anuncios=$db->listar_MisReservas($_SESSION["usuario"]->getIdUsuario());
        if($anuncios){
        require_once("../vista/GestionReservas.php");
        }else{
            // Hacer alert
            $_SESSION["noHayReservas"]= "No hay ninguna reserva para gestionar.";
            header("location:../index.php");
        }
    }
    else{
        header("location:../index.php");
    }
ob_end_flush();
?>