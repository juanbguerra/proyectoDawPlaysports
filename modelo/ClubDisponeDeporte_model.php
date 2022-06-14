<?php
include_once("Deporte_model.php");
include_once("ClubDeportivo_model.php");
class ClubDisponeDeporte_model{
    private $idClubDeporte;
    private $deporte;
    private $clubDeportivo;
    private $precio;
    private $nombrePista;
    private $foto;
    
    //Constructor de la clase clubDisponeDeporte
    public function __construct($idClubDeporte, $deporte, $clubDeportivo, $precio, $nombrePista, $foto){
        $this->idClubDeporte = $idClubDeporte;
        $this->deporte = $deporte;
        $this->clubDeportivo = $clubDeportivo;
        $this->precio = $precio;
        $this->nombrePista = $nombrePista;
        $this->foto = $foto;
    }

    //Setter y Getter
    function setIdClubDeporte($idClubDeporte){
        $this->idClubDeporte = $idClubDeporte; 
    }
    function getIdClubDeporte(){
        return $this->idClubDeporte;
    }

    function setDeporte($deporte){
        $this->deporte = $deporte; 
    }
    function getDeporte(){
        return $this->deporte;
    }
    
    function setClubDeportivo($clubDeportivo){
        $this->clubDeportivo = $clubDeportivo; 
    }
    function getClubDeportivo(){
        return $this->clubDeportivo;
    }
    
    function setPrecio($precio){
        $this->precio = $precio; 
    }
    function getPrecio(){
        return $this->precio;
    }
    
    function setNombrePista($nombrePista){
        $this->nombrePista = $nombrePista; 
    }
    function getNombrePista(){
        return $this->nombrePista;
    }
    
    function setFoto($foto){
        $this->foto = $foto; 
    }
    function getFoto(){
        return $this->foto;
    }
}
?>