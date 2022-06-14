<?php
//Controlador para mensaje de alert para que se registe el usuario.
    if(!isset($_SESSION["usuario"])){
        session_start();
        $_SESSION["registrateUsuario"] = "Debes registrate o loguearte para poder inscribirte en un anuncio.";
        header("location:../index.php");
    }
?>
