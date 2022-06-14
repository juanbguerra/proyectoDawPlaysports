<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y estan establecidos los campos del usuario y el usuario es de tipo administrador.
// LLamamos al metodo de la base de datos pasandole el usuario seleccionado y lo modificamos y mostramos alert.
    if(isset($_SESSION["usuario"]) && isset($_POST["nombre"]) && isset($_POST["pwd"]) && isset($_POST["apellidos"]) && isset($_POST["email"])){
        if($_SESSION["usuario"]->getTipoUsuario() == "1"){
            $db = new Conectar();
            $usuarioModificado=$db->modificarUsuarios($_SESSION["usuarioSelecionado"]);
            
            if ($usuarioModificado){
                $_SESSION["usuarioModificadoAdmin"] = "Se ha modificado el usuario con éxito";
                header("location:gestionUsuarios_controller.php");
            }
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
