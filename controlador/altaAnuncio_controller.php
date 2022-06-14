<?php
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
    // Si el usuario de la sesión está establecido podemos dar de alta un anuncio y ver si vista si no llamamos a index.
    if(isset($_SESSION["usuario"])){
        $db = new Conectar();
        $listaDeportes=$db->listarDeportes();
        require_once("../vista/AltaAnuncio.php");
    }else{
        header("location:../index.php");
    }
?>
