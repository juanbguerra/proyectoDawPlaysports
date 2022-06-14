<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y esta establecido el campo nombrePista y el precioPista y el usuario es tipo administrador o colaborador.
//LLamamos al metodo de la base de datos pasandole la pista seleccionada para modificarla y si se ha modificado mandamos alert.
    if(isset($_SESSION["usuario"]) && isset($_POST["nombrePista"]) && isset($_POST["precioPista"])){
        if($_SESSION["usuario"]->getTipoUsuario() == 1 || $_SESSION["usuario"]->getTipoUsuario() == 3){
            $db = new Conectar();
            $pistaModificado=$db->modificarPista($_SESSION["pistaSelecionada"]);
            if ($pistaModificado){
                $_SESSION["pistaModificado"] = "Se ha modificado la pista con éxito";
                header("location:administrarPistas_controller.php");
            }
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
