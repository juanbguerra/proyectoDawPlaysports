<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y esta establecido el idUsuario y es de tipo administrador llamamos a metodo de la base de datos para seleccionar el usuario
// Para hacer el modificar perfil.
    if(isset($_SESSION["usuario"]) && isset($_POST["idUsuario"])){
        if($_SESSION["usuario"]->getTipoUsuario() == "1"){
            $db = new Conectar();
            $selecionarUsuario=$db->selecionarUsuarioPorId($_POST["idUsuario"]);
    
            if ($selecionarUsuario){
                $_SESSION["usuarioSelecionado"] = $selecionarUsuario["usuario"];
                require_once("../vista/ModificarUsuario2.php");
            }
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
