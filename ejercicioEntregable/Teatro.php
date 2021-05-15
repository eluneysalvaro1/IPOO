<?php 



class Obra_Teatro extends Funcion{
    public function __construct($nombre,$horaInicio,$duracionObra,$precio){
        parent::__construct($nombre,$horaInicio,$duracionObra,$precio);
    }

    public function darCosto(){
        $precioFuncion = parent::darCosto();
        $porcentaje = 0.45; 
        $resultado = $precioFuncion + ($precioFuncion * $porcentaje);
        return $resultado;
    }



    public function __toString(){
        return parent::__toString();
    }

}


?>