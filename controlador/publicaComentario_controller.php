<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
    // Si esta establecido el usuario en la sesión y esta establacido el idUsuarioComenta y idUsuarioRecibe y comentario
    // Y el idUsuarioComenta es diferente del idUsuarioRecibe.
    // LLamamos al metodo de la base de datos y publicamos el comentario.
    if(isset($_SESSION["usuario"])){
        
        if(isset($_POST["idUsuarioComenta"]) && isset($_POST["idUsuarioRecibe"]) && isset($_POST["comentario"])){
            if($_POST["idUsuarioComenta"] != $_POST["idUsuarioRecibe"]){
                $db = new Conectar();
                $insertarComentario=$db->insertarComentario($_POST["idUsuarioComenta"], $_POST["idUsuarioRecibe"], $_POST["comentario"]);
                header("location:perfilUsuario_controller.php?idUsuario=".$_POST["idUsuarioRecibe"]);
            }else{
                $_SESSION["noComentarioAsiMismo"] = "No puedes poner un comentario a ti mismo.";
                header("location:../index.php");
            }
        }  
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
