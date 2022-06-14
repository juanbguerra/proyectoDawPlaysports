<?php
class Deporte_model{
    private $idDeporte;
    private $nombreDeporte;

    //Constructor de la clase Deporte
    public function __construct($idDeporte, $nombreDeporte){
        $this->idDeporte = $idDeporte;
        $this->nombreDeporte = $nombreDeporte;
    }

    //Setter y Getter
    function setIdDeporte($idDeporte){
        $this->idDeporte = $idDeporte; 
    }
    function getIdDeporte(){
        return $this->idDeporte;
    }

    function setNombreDeporte($nombreDeporte){
        $this->nombreDeporte = $nombreDeporte; 
    }
    function getNombreDeporte(){
        return $this->nombreDeporte;
    }
}
?>