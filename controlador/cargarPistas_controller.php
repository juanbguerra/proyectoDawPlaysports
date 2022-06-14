<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
    //Si esta establecido el usuario en la sesión  y si es tipo administrador o colaborador, si esta establecido el campo idClub lo guardamos en la sesion
    //Y llamamos a los metodos para cargar las pistas de la base de datos llamando a su vista.
    if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]->getTipoUsuario() == 1 || $_SESSION["usuario"]->getTipoUsuario() == 3){

            if(isset($_POST["idclub"])){
                $idClub = $_POST["idclub"];
                $_SESSION["idClub"] = $idClub;
                $db = new Conectar();
                $listarClubDeportivo=$db->listarClubDeportivo();
                $listarPistas=$db->listarPistaByIdClub($idClub);
                require_once("../vista/GestionPistas.php");
            }else{
                header("location:administrarPistas_controller.php");
            }
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
