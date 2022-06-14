<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    session_start();
    require_once("../modelo/Usuario_model.php");
// Si esta establecido el usuario en la sesión y esta establecido el idAnuncio pillamos el idUsuario y lo insertamos en el anuncio ese usuario
    if(isset($_SESSION["usuario"]) && isset($_POST["idAnuncio"])){
        $idUsuario = $_SESSION["usuario"]->getIdUsuario();
        $db = new Conectar();
        $inscripcion=$db->insertarUsuarioParticipaAnuncio($idUsuario,$_POST["idAnuncio"]);
        if($inscripcion){
            $db->actualizarPlazasAnuncioById($_POST["idAnuncio"], true);
            header("location:../index.php");
        }else{
            header("location:../index.php");
        }
    }
    else{
        header("location:../index.php");
    }
ob_end_flush();
?>
