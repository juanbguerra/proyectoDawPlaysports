<?php
class Municipio_model{
    private $idMunicipio;
    private $nombre;
    private $codigoPostal;
    
    //Constructor de la clase municipio
    public function __construct($idMunicipio, $nombre, $codigoPostal){
        $this->idMunicipio = $idMunicipio;
        $this->nombre = $nombre;
        $this->codigoPostal = $codigoPostal;
    }

    //Setter y Getter
    function setIdMunicipio($idMunicipio){
        $this->idMunicipio = $idMunicipio; 
    }
    function getIdMunicipio(){
        return $this->idMunicipio;
    }

    function setNombre($nombre){
        $this->nombre = $nombre; 
    }
    function getNombre(){
        return $this->nombre;
    }
        
    function setCodigoPostal($codigoPostal){
        $this->codigoPostal = $codigoPostal; 
    }
    function getCodigoPostal(){
        return $this->codigoPostal;
    }
}
?>