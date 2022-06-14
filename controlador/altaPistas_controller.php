<?php
ob_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../db/db.php");
    require_once("../modelo/Anuncio_model.php");
    require_once("../modelo/Usuario_model.php");
    session_start();
    $insertarPista = false;
    // Si esta establecido el usuario en la sesión y es del tipo administrador o colaborador, llamamos al metodo para dar de alta pistas,
    // Si estan rellenos los campos de dar de alta una pista, hacemos el insertar pistas en la bd y mostramos mensaje de insertado correctamente.
    if(isset($_SESSION["usuario"]))
    {
        if($_SESSION["usuario"]->getTipoUsuario() == 1 || $_SESSION["usuario"]->getTipoUsuario() == 3){
            $db = new Conectar();
            $listaDeportes=$db->listarDeportes();
            $listaClubDeportivo = $db->listarClubDeportivo();
            require_once("../vista/AltaPistas.php");
            if(isset($_POST["precioPista"]) && isset($_POST["nombrePista"]) && isset($_POST["clubDeportivo"]) && isset($_POST["deporte"])){
                $precioPista = $_POST["precioPista"];
                $nombrePista = $_POST["nombrePista"];
                $clubDeportivo = $_POST["clubDeportivo"];
                $deporte = $_POST["deporte"];
                $insertarPista = $db->insertar_Pista($precioPista, $nombrePista, $clubDeportivo,$deporte);
                header("Refresh:0");
            } 
            if ($insertarPista){
                $_SESSION["insertadoPista"] = "Se ha insertado la pista correctamente";
                header("location:../index.php");   
            }
        }else{
            header("location:../index.php");
        }
     /*   $db = new Conectar();
        $listaDeportes=$db->listarDeportes();
        require_once("../vista/AltaAnuncio.php");*/
    }else{
        header("location:../index.php");
    }
ob_end_flush();
?>
