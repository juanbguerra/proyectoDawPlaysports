<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
    // Si esta establecido el usuario en la sesión y es de tipo administrador y esta establecido el idAnuncio publicamos el anuncio
    if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getTipoUsuario() == 1){
        
        if(isset($_POST["idAnuncio"])){
            $db = new Conectar();
            $publicarAnuncio=$db->publicarAnuncio();
            if($publicarAnuncio){
                $_SESSION["anuncioPublicado"] = "Se ha publicado el anuncio correctamente";
                header("location:gestionAnuncios_controller.php");
            }
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
