<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y el idUsuario por get esta establecio llamamos a metodos de db.
    if(isset($_SESSION["usuario"])){
        
        if(isset($_GET["idUsuario"])){
            $db = new Conectar();
            $buscarUsuario=$db->selecionarUsuarioPorId($_GET["idUsuario"]);
            $comentariosUsuario=$db->listar_comentariosByIdUsuario($buscarUsuario["idUsuario"]);
            if($buscarUsuario){
                require_once("../vista/PerfilUsuario.php");
            }else{
                header("location:../index.php");
            }
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
