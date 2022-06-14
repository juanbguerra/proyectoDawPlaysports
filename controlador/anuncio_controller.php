<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    session_start();
    require_once("../modelo/Usuario_model.php");
    //Si esta establecido el usuario en la sesión y si el campo idAnuncio viene por get o por post guardamos de una forma u otra en la variable.
    // LLamamos a los metodos de la base de datos pasandole ese anuncio en concreto y vemos su vista.
    if(isset($_SESSION["usuario"])){
        if(isset($_GET["idAnuncio"]))
            {$idAnuncio = $_GET["idAnuncio"];
        }else{
            $idAnuncio = $_POST["idAnuncio"];
        }
        $db = new Conectar();
        $anuncio=$db->listar_anunciosByIdAnuncio($idAnuncio);
        $usuarios=$db->listar_usuariosParticipantesByIdAnuncio($idAnuncio);

        if($anuncio){
            require_once("../vista/Anuncio.php");
        }else{
            header("location:../index.php");
        }
    }
    else{
        header("location:../index.php");
    }
ob_end_flush();
?>
