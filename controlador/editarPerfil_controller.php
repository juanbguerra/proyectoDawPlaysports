<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión llamamos al metodo de la base de datos pasandole el id de ese usuario de la sesion
// Si estan rellenos los campos de editar perfil modificamos el perfil del usuario.
    if(isset($_SESSION["usuario"])){
        $db = new Conectar();
        $selecionarUsuario=$db->selecionarUsuarioPorId($_SESSION["usuario"]->getIdUsuario());
        require_once("../vista/ModificarUsuario3.php");

        if(isset($_POST["nombre"]) && isset($_POST["pwd"]) && isset($_POST["apellidos"]) && isset($_POST["email"])){
           $selecionarUsuario=$db->modificarUsuarios($_SESSION["usuario"]->getUsuario());
            if ($selecionarUsuario){
                $_SESSION["usuarioModificadoPerfil"] = "Se ha modificado tu perfil correctamente";
                header("location:../index.php");
            }
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
