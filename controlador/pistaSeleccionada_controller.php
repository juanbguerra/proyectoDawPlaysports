<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    require_once("../modelo/ClubDisponeDeporte_model.php");
    session_start();
// Si esta establecido el usuario en la sesión y esta establecido el idClubDeporte y el usuario es de tipo administrador o colaborador.
//Seleccionamos la pista para modificarla.
    if(isset($_SESSION["usuario"]) && isset($_POST["idClubDeporte"])){
        if($_SESSION["usuario"]->getTipoUsuario() == 1 || $_SESSION["usuario"]->getTipoUsuario() == 3){
            $db = new Conectar();
            $seleccionarPista=$db->selecionarPistaPorId($_POST["idClubDeporte"]);
    
            if ($seleccionarPista){
                $_SESSION["pistaSelecionada"] = $seleccionarPista["idClubDeporte"];
                require_once("../vista/ModificarPista.php");
            }
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
