<?php

class Cafetera{
    private $capacidadMaxima;
    private $cantidadActual;

    public function __construct($capacidadMaxima, $cantidadActual){
        $this->capacidadMax = $capacidadMaxima;
        $this->cantidadAct = $cantidadActual;
    }

    public function setCapacidad($capacidad){
        $this->capacidadMaxima = $capacidad;
    }
    public function getCapacidad(){
        return $this->capacidadMaxima;
    }

    public function setCantidad($cantidad){
        $this->cantidadActual = $cantidad;
    }
    public function getCantidad(){
        return $this->cantidadActual;
    }

    public function llenarCafetera(){
        echo "Llenando...\n";
        $this->cantidadAct = $this->capacidadMax;
        echo "Lleno... con: " . $this->cantidadAct . "de Cafe\n";
    }

    public function servirTaza($cantidad){
        echo "Sirviendo...\n"; 
        if ($cantidad > $this->cantidadAct) {
            echo "No queda suficiente café... por eso le servimos: \n" . $this->cantidadAct;
            echo "\nFaltaron: " . $cantidad - $this->cantidadAct; 
        }else{
            echo "Listo se ha servido su taza...\n"; 
            $this->cantidadAct = $this->cantidadAct - $cantidad;
        }

    }

    public function vaciarCafetera(){
        echo "Vaciando cafetera...\n";
        $this->cantidadAct = 0;
        echo "Cafetera Vacia \n";
    }

    public function agregarCafe($cantidad){
        echo "Agregando cafe..."; 
        if ($cantidad > $this->capacidadMax) {
            echo "No se puede agregar tanto café... Por eso te lo lleno hasta el tope\n";
            $this->cantidadAct = $this->capacidadMax; 
        }elseif (($cantidad + $this->cantidadAct) == $this->capacidadMax || $cantidad == $this->capacidadMax) {
            echo "Se ha llenado de café la cafetera: \n";
            $this->cantidadAct = $this->capacidadMax;
        }else{
            $this->cantidadAct = $this->cantidadAct + $cantidad;
        }
        
    }

    public function __toString(){
        return "Cantidad Actual: " . $this->cantidadAct . "\n Capacidad Max: " . $this->capacidadMax;
    }

}

?>