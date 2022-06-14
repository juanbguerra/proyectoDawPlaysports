<?php
include_once("Usuario_model.php");
include_once("Deporte_model.php");
class Anuncio_model{
    private $idAnuncio;
    private $usuario;
    private $deporte;
    private $precioPorJugador;
    private $descripcion;
    private $validado;
    private $jugadoresNecesitados;
    private $fecha;
    private $numJugadoresTotales;
    private $pista;
    private $club;
    private $municipio;
    private $precioTotal;

    //Constructor de la clase Anuncio
    public function __construct($idAnuncio, $usuario, $deporte, $precioPorJugador, $descripcion, $validado, $jugadoresNecesitados, $fecha, $numJugadoresTotales, $pista, $club, $municipio, $precioTotal){
        $this->idAnuncio = $idAnuncio;
        $this->usuario = $usuario;
        $this->deporte = $deporte;
        $this->precioPorJugador = $precioPorJugador;
        $this->descripcion = $descripcion;
        $this->validado = $validado;
        $this->jugadoresNecesitados = $jugadoresNecesitados;
        $this->fecha = $fecha;
        $this->numJugadoresTotales = $numJugadoresTotales;
        $this->pista = $pista;
        $this->club = $club;
        $this->municipio = $municipio;
        $this->precioTotal = $precioTotal;
    }

    //Setter y Getter
    function setIdAnuncio($idAnuncio){
        $this->idAnuncio = $idAnuncio; 
    }
    function getIdAnuncio(){
        return $this->idAnuncio;
    }

    function setUsuario($usuario){
        $this->usuario = $usuario; 
    }
    function getUsuario(){
        return $this->usuario;
    }

    function setDeporte($deporte){
        $this->deporte = $deporte; 
    }
    function getDeporte(){
        return $this->deporte;
    }

    function setPrecioPorJugador($precioPorJugador){
        $this->precioPorJugador = $precioPorJugador; 
    }
    function getPrecioPorJugador(){
        return $this->precioPorJugador;
    }
    
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion; 
    }
    function getDescripcion(){
        return $this->descripcion;
    }

    function setValidado($validado){
        $this->validado = $validado; 
    }
    function getValidado(){
        return $this->validado;
    }

    function setJugadoresNecesitados($jugadoresNecesitados){
        $this->jugadoresNecesitados = $jugadoresNecesitados; 
    }
    function getJugadoresNecesitados(){
        return $this->jugadoresNecesitados;
    }

    function setFecha($fecha){
        $this->fecha = $fecha; 
    }
    function getFecha(){
        return $this->fecha;
    }

    function setNumJugadoresTotales($numJugadoresTotales){
        $this->numJugadoresTotales = $numJugadoresTotales; 
    }
    function getNumJugadoresTotales(){
        return $this->numJugadoresTotales;
    }

    function setPista($pista){
        $this->pista = $pista; 
    }
    function getPista(){
        return $this->pista;
    }

    function setClub($club){
        $this->club = $club; 
    }
    function getClub(){
        return $this->club;
    }

    function setMunicipio($municipio){
        $this->municipio = $municipio; 
    }
    function getMunicipio(){
        return $this->municipio;
    }

    function setPrecioTotal($precioTotal){
        $this->precioTotal = $precioTotal; 
    }
    function getPrecioTotal(){
        return $this->pista;
    }

}
?>