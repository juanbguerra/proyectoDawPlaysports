<?php
include_once("Usuario_model.php");
class UsuarioComentaUsuario_model{
    private $idUsuarioComentaUsuario;
    private $usuarioComenta;
    private $usuarioRecibe;
    private $comentario;


    //Constructor de la clase Anuncio
    public function __construct($idUsuarioComentaUsuario, $usuarioComenta, $usuarioRecibe, $comentario){
        $this->idUsuarioComentaUsuario = $idUsuarioComentaUsuario;
        $this->usuarioComenta = $usuarioComenta;
        $this->usuarioRecibe = $usuarioRecibe;
        $this->comentario = $comentario;
    }

    //Setter y Getter
    function setIdUsuarioComentaUsuario($idUsuarioComentaUsuario){
        $this->idUsuarioComentaUsuario = $idUsuarioComentaUsuario; 
    }
    function getIdUsuarioComentaUsuario(){
        return $this->idUsuarioComentaUsuario;
    }

    function setusuarioComenta($usuarioComenta){
        $this->usuarioComenta = $usuarioComenta; 
    }
    function getUsuarioComenta(){
        return $this->usuarioComenta;
    }

    function setUsuarioRecibe($usuarioRecibe){
        $this->usuarioRecibe = $usuarioRecibe; 
    }
    function getUsuarioRecibe(){
        return $this->usuarioRecibe;
    }

    function setComentario($comentario){
        $this->comentario = $comentario; 
    }
    function getComentario(){
        return $this->comentario;
    }
}
?>