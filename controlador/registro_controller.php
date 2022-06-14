<?php
ob_start();

    session_start();
    require_once("../funciones/valorSeguro.php");
    require_once("../modelo/Usuario_model.php");
    require_once("../db/db.php");
    require_once("../vista/RegistroUsuario.php");
//Si estan establecidos los campos de registro, registramos el usuario.
    if(isset($_POST["validationCustomNombre"]) && isset($_POST["validationCustomApellidos"]) && isset($_POST["validationCustomUsuario"])){
        //Conectamos la base de datos y llamamos a su metodo insertar_usuarios si no devuelve falso creamos un nuevo objeto usuario
        $db = new Conectar();
        $datos=$db->insertar_usuarios();
        header("Refresh:0");
        if ($datos){
            $_SESSION["registroCorrecto"] = "Se ha registrado correctamente";
            header("location:../index.php");
        }
    }
ob_end_flush();
?>