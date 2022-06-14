<?php
ob_start();
//Controlador para controlar el login de entrada iniciamos la sesion y añadimos las vistas , modelos y base de datos necesarios
    require_once("funciones/valorSeguro.php");
    require_once("db/db.php");
    require_once("modelo/Anuncio_model.php");
    require_once("modelo/Usuario_model.php");
    session_start();
    $db = new Conectar();
    $anuncios=$db->listar_anuncios(1,true);
    require_once("vista/principal.php");
    //Si el usuario y la contraseña estan establecidas
    if(isset($_POST["usuario"]) && isset($_POST["password"])){
        //LLamamos al metodo de la base de datos de comprobar login
        $datos=$db->comprobarLogin();
        //Si el login es correcto creamos un nuevo objeto usuario con los datos de ese usuario y lo guardamos en la sesion,si no alert error.
        if($datos != false){
            $user = new Usuario_model($datos["idUsuario"], $datos["nombre"], $datos["apellidos"],$datos["usuario"], $datos["contrasena"] , $datos["email"], $datos["telefono"], $datos["idTipoUsuario"]);
            $_SESSION["usuario"] = $user;
             header("location:index.php");
        }else{
            $_SESSION["errorLogin"] = "Nombre de usuario o contraseña incorrectos";
            header("location:index.php");
        } 
    }
ob_end_flush();
?>