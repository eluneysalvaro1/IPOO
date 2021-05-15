<?php 




class Musical extends Funcion{
    private $director;
    private $cantidadActores; 

    public function __construct($nombre,$horaInicio,$duracionObra,$precio,$director,$cantidadActores){
        parent::__construct($nombre,$horaInicio,$duracionObra,$precio);
        $this->director = $director;
        $this->cantidadActores = $cantidadActores;
    }


    public function setDirector($director){
        $this->director = $director;
    }

    public function getDirector(){
        return $this->director;
    }

    public function setCantidadActores($cA){
        $this->cantidadActores = $cA;
    }

    public function getCantidadActores(){
        return $this->cantidadActores;
    }

    public function darCosto(){
        $precioFuncion = parent::darCosto();
        $porcentaje = 0.12; 
        $resultado = $precioFuncion + ($precioFuncion * $porcentaje);
        return $resultado;
    }



    public function __toString(){
        return parent::__toString() . "\n" . 
                "Director: " . $this->getDirector() . "\n" . 
                "Cantidad Actores: " . $this->getCantidadActores() . "\n";     
    }


}



?>