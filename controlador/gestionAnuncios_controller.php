<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    session_start();
    require_once("../modelo/Usuario_model.php");
    //Si el usuario de la sesion esta establecido y el usuario es tipo administrador, llamamos a listar los anuncios para validarlos y si no hay anuncios para validar mostramos alert.
    if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getTipoUsuario() == 1){
        $db = new Conectar();
        $anuncios=$db->listar_anuncios(0,false);
        if($anuncios){
        require_once("../vista/GestionAnuncios.php");
        }else{
            $_SESSION["noAnunciosParaPublicar"]= "No hay anuncios pendientes para publicar";
            header("location:../index.php");
        }
    }
    else{
        header("location:../index.php");
    }
ob_end_flush();
?>