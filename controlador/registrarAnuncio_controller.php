<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../modelo/Anuncio_model.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
    require_once("../db/db.php");
    $idUsuario = $_SESSION["usuario"]->getIdUsuario();
    // Si esta establecido el usuario en la sesión y estan rellenos los campos del anuncio, insertamos el anuncio y madamos alert.
    if(isset($_SESSION["usuario"]))
    {
        if(isset($_POST["deporte"]) && isset($_POST["pistas"]) && isset($_POST["clubDeportivo"]) && isset($_POST["municipio"])
            && isset($_POST["descripcion"]) &&  isset($_POST["fecha"]) && isset($_POST["jugadores"]) && isset($_POST["precio"])
            && isset($_POST["plazas"]) && isset($_POST["preciojugador"]))
        {
            $deporte = $_POST["deporte"];
            $pistas = $_POST["pistas"];
            $clubDeportivo = $_POST["clubDeportivo"];
            $municipio = $_POST["municipio"];
            $descripcion = $_POST["descripcion"];
            $fecha = $_POST["fecha"];
            $jugadores = $_POST["jugadores"];
            $precio = $_POST["precio"];
            $plazas = $_POST["plazas"];
            $preciojugador = $_POST["preciojugador"];

            $db = new Conectar();
            $datos=$db->insertar_anuncio($deporte,$pistas,$clubDeportivo,$municipio,$descripcion,$fecha,$jugadores,$precio,$plazas,$preciojugador,$idUsuario);
            header("Refresh:0");
           // $listaDeportes=$db->listarDeportes();
            if ($datos){
                $_SESSION["insertadoAnuncio"] = "Se ha insertado correctamente el anuncio";
                header("location:../index.php");   
            }else{
                $_SESSION["errorAltaAnuncioPistaFecha"] = "La pista seleccionada ya tiene una reserva en la fecha y hora indicados";
                header("location:../index.php");  
            }
        }else{
            header("location:altaAnuncio_controller.php");
        }
    }else{
        header("location:../index.php");  
    }
ob_end_flush();
?>
