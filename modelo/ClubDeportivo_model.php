<?php
include_once("Municipio_model.php");
class ClubDeportivo_model{
    private $idClubDeportivo;
    private $municipio;
    private $nombre;
    private $direccion;
    private $telefono;

    //Constructor de la clase clubDeportivo
    public function __construct($idClubDeportivo, $municipio, $nombre, $direccion, $telefono){
        $this->idClubDeportivo = $idClubDeportivo;
        $this->municipio = $municipio;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->direccion = $direccion;
    }

    //Setter y Getter
    function setIdClubDeportivo($idClubDeportivo){
        $this->idClubDeportivo = $idClubDeportivo; 
    }
    function getIdClubDeportivo(){
        return $this->idClubDeportivo;
    }

    function setMunicipio($municipio){
        $this->municipio = $municipio; 
    }
    function getMunicipio(){
        return $this->municipio;
    }
    
    function setNombre($nombre){
        $this->nombre = $nombre; 
    }
    function getNombre(){
        return $this->nombre;
    }
    
    function setDireccion($direccion){
        $this->direccion = $direccion; 
    }
    function getDirecciono(){
        return $this->direccion;
    }
    
    function setTelefono($telefono){
        $this->telefono = $telefono; 
    }
    function getTelefono(){
        return $this->telefono;
    }
}
?>