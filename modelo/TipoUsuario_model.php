<?php
class TipoUsuario_model{
    private $idTipoUsuario;
    private $nombreTipo;
    
    //Constructor de la clase usuarios
    public function __construct($idTipoUsuario, $nombreTipo){
        $this->idTipoUsuario = $idTipoUsuario;
        $this->nombreTipo = $nombreTipo;
    }

    //Setter y Getter
    function setIdTipoUsuario($idTipoUsuario){
        $this->idTipoUsuario = $idTipoUsuario; 
    }
    function getIdTipoUsuario(){
        return $this->idTipoUsuario;
    }
    function setNombreTipo($nombreTipo){
        $this->nombreTipo = $nombreTipo; 
    }
    function getNombreTipo(){
        return $this->nombreTipo;
    }
}
?>