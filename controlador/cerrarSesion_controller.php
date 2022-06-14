<?php
//Controlador que nos inicia la sesion la destrulle y nos redirije al index es decir al login de nuevo.
    session_start();
    session_destroy();
    header("location:../index.php");
?>
