<?php
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
//Si esta establecido el usuario en la sesión y es del tipo administrador si el campo idAnuncio esta relleno eliminamos nuestro anuncio de la bd.
//  Mostramos alert.
    if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getTipoUsuario() == 1){
        if(isset($_POST["idAnuncio"])){
            $db = new Conectar();
            $publicarAnuncio=$db->borrarAnuncio($_POST["idAnuncio"]);
            
            if($publicarAnuncio){
                $_SESSION["anuncioEliminado"] = "Se ha eliminado el anuncio correctamente";
                header("location:gestionAnuncios_controller.php");
            }
            
        }
    }else{
        header("location:../index.php");
    }
?>
