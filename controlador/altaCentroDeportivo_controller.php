<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
    require_once("../modelo/ClubDeportivo_model.php");
    require_once("../modelo/Municipio_model.php");
    //Si el usuario de la sesión está establecido y es de tipo administrador o colaborador vemos la vista para registrar centros deportivos
    // Si estan establecidos los campos de dar de alta un centro deportivo hacemos su método para insertarlo en la bd y segun lo que nos devuelva
    // Mostramos un alert de lo que sea y redirigimos a una vista u otra.
    if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getTipoUsuario() == 1 || $_SESSION["usuario"]->getTipoUsuario() == 3){
        require_once("../vista/AltaCentroDeportivo.php");
        if(isset($_POST["nombreCD"]) && isset($_POST["direccionCD"]) && isset($_POST["telefonoCD"]) && isset($_POST["municipioCD"]) && isset($_POST["codigoCD"])){
            $db = new Conectar();
            $centroDeportivo=$db->insertar_centroDeportivo();
            //echo($centroDeportivo);
            if($centroDeportivo == 0){
                $_SESSION["centroDeportivoRegistrado"]= "El centro deportivo se ha registrado correctamente";
                header("location:../index.php");
            }//ok
            if($centroDeportivo == 1){
                $_SESSION["centroDeportivoNoRegistrado"]= "El municipio no se ha registrado correctamente";
                header("location:../index.php");
            }//falla municipio
            if($centroDeportivo == 2){
                $_SESSION["errorCentroDeportivoNombreRegistrado"] = "El Centro Deportivo ya está registrado o no es posible registrarlo";
                header("location:../index.php");
            }//falla club
        }
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>