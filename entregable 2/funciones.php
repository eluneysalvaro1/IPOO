<?php

class Funcion{

    private $nombre;
    private $horaInicio;
    private $duracionObra;
    private $precio;

    public function __construct($nombre,$horaInicio,$duracionObra,$precio){
        $this->nombre = $nombre;
        $this->horaInicio = $horaInicio;
        $this->duracionObra = $duracionObra;
        $this->precio = $precio;
    }

    public function setNombre($nombreNuevo){
        $this->nombre = $nombreNuevo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setHoraInicio($nuevaHora){
        $this->horaInicio = $nuevaHora;
    }

    public function getHoraInicio(){
        return $this->horaInicio;
    }

    public function setDuracionObra($nuevaHora){
        $this->duracionObra = $nuevaHora;
    }

    public function getDuracionObra(){
        return $this->duracionObra;
    }

    public function setPrecio($nuevoPrecio){
        $this->precio = $nuevoPrecio;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function __toString(){
        $nombre = $this->getNombre();
        $horaInicio = $this->getHoraInicio();
        $duracionObra = $this->getDuracionObra();
        $precio = $this->getPrecio();
        return "Nombre: " . $nombre . "\n" . 
                "Hora de Inicio: " . $horaInicio . "\n" . 
                "Duracion obra: " . $duracionObra . "\n" . 
                "Precio: " . $precio . "\n";
    }



}


?>