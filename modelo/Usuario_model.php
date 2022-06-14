<?php
include_once("TipoUsuario_model.php");
class Usuario_model{
    private $idUsuario;
    private $nombre;
    private $apellidos;
    private $usuario;
    private $contrasena;
    private $email;
    private $telefono;
    private $tipoUsuario;

    //Constructor de la clase usuario
    public function __construct($idUsuario, $nombre, $apellidos, $usuario, $contrasena, $email, $telefono, $tipoUsuario){
        $this->idUsuario= $idUsuario;
        $this->nombre= $nombre;
        $this->apellidos = $apellidos;
        $this->usuario= $usuario;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->tipoUsuario = $tipoUsuario;
    }
    //Setter y Getter
    function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario; 
    }
    function getIdUsuario(){
        return $this->idUsuario;
    }

    function setNombre($nombre){
        $this->nombre = $nombre; 
    }
    function getNombre(){
        return $this->nombre;
    }

    function setUsuario($usuario){
        $this->usuario = $usuario; 
    }
    function getUsuario(){
        return $this->usuario;
    }

    function setApellidos($apellidos){
        $this->apellidos = $apellidos; 
    }
    function getApellidos(){
        return $this->apellidos;
    }

    function setContrasena($contrasena){
        $this->contrasena = $contrasena; 
    }
    function getContrasena(){
        return $this->contrasena;
    }

    function setEmail($email){
        $this->email = $email; 
    }
    function getEmail(){
        return $this->email;
    }

    function setTelefono($telefono){
        $this->telefono = $telefono; 
    }
    function getTelefono(){
        return $this->telefono;
    }
    
    function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario; 
    }
    function getTipoUsuario(){
        return $this->tipoUsuario;
    }

}
?>