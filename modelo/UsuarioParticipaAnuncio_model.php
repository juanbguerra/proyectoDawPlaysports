<?php
include_once("Usuario_model.php");
include_once("Anuncio_model.php");
class UsuarioParticipaAnuncio_model{
    private $idParticipacion;
    private $usuario;
    private $anuncio;

    //Constructor de la clase UsuaruioParticipaAnuncio
    public function __construct($idParticipacion, $usuario, $anuncio){
        $this->idParticipacion = $idParticipacion;
        $this->usuario = $usuario;
        $this->anuncio = $anuncio;
    }
    
    //Setter y Getter
    function setIdParticipacion($idParticipacion){
        $this->idParticipacion = $idParticipacion; 
    }
    function getIdParticipacion(){
        return $this->idParticipacion;
    }

    function setUsuario($usuario){
        $this->usuario = $usuario; 
    }
    function getUsuario(){
        return $this->usuario;
    }

    function setAnuncio($anuncio){
        $this->anuncio = $anuncio; 
    }
    function getAnuncio(){
        return $this->anuncio;
    }
}
?>