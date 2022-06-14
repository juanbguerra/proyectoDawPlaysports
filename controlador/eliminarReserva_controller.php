<?php
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y esta establecido el idAnuncio borramos la reserva del usuario en concreto y modificamos las plazas del anuncio y mostramos mensaje alerta.
    if(isset($_SESSION["usuario"])){
        if(isset($_POST["idAnuncio"])){
            $db = new Conectar();
            $borrarReserva=$db->borrarReserva($_POST["idAnuncio"], $_SESSION["usuario"]->getIdUsuario());
            
            if($borrarReserva){
                $db->actualizarPlazasAnuncioById($_POST["idAnuncio"], false);
                $_SESSION["reservaEliminada"] = "Se ha eliminado la reserva correctamente";
                header("location:gestionReservas_controller.php");
            }
        }
    }else{
        header("location:../index.php");
    }
?>
