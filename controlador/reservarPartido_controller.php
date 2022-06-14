<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    session_start();
    require_once("../modelo/Usuario_model.php");
// Si esta establecido el usuario en la sesión llamamos a metodos de la base de datos para ver los anuncios.
    if(isset($_SESSION["usuario"])){
        $db = new Conectar();
        $anuncios=$db->listar_anuncios(1,false);
        $listaDeporte=$db->listarDeportes();

        if($anuncios){
            require_once("../vista/ReservarPartido.php");
        }else{
            header("location:../index.php");
        }
    }
    else{
        header("location:../index.php");
    }
ob_end_flush();
?>
