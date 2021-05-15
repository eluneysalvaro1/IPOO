<?php 

class Cine extends Funcion{

    private $genero;
    private $pais;

    public function __construct($nombre,$horaInicio,$duracionObra,$precio, $genero,$pais){
        parent::__construct($nombre,$horaInicio,$duracionObra,$precio);
        $this->genero = $genero;
        $this->pais = $pais;
    }


    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getGenero(){
        return $this->genero;
    }


    public function setPais($pais){
        $this->pais = $pais;
    }

    public function getPais(){
        return $this->pais;
    }


    public function darCosto(){
        $precioFuncion = parent::darCosto();
        $porcentaje = 0.65; 
        $resultado = $precioFuncion + ($precioFuncion * $porcentaje);
        return $resultado;
    }


    public function __toString(){
        return parent::__toString() . "\n" .  
                "Genero: " . $this->getGenero() . "\n" . 
                "Pais: " . $this->getPais() . "\n";  
    }


}


?>