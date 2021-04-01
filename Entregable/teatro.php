<?php

 class Teatro{
    private $nombreTeatro;
    private $direccion;
    

    public function __construct($nombreTeatro,$direccion){
        $this->nombreTeatro = $nombreTeatro;
        $this->direccion = $direccion;
        
       
        $this->funciones[0] =  ["nombre" => "Mago de Oz" , "precio" => 950];
        $this->funciones[1] = ["nombre" => "Ratatoille" , "precio" => 500];
        $this->funciones[2] = ["nombre" => "Rata" , "precio" => 550];
        $this->funciones[3] = ["nombre" => "Soga al cuello" , "precio" => 700];
    }

    
    public function setNombreTeatro($nuevoNombre){
        $this->nombreTeatro = $nuevoNombre;
    }
    public function getNombreTeatro(){
        return $this->nombreTeatro;
    }
    
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getDireccion(){
        return $this->direccion;
    }

    public function setFunciones($funciones){
        $this->funciones = $funciones;
    }
    public function getFunciones(){
        return $this->funciones;
    }


    private function encontrarFuncion($nombreFuncion){
        $funciones = $this->getFunciones();
        $retorno = [false,-1];
        for ($i=0; $i < count($funciones); $i++) { 
            if ($funciones[$i]["nombre"] == $nombreFuncion) {
                $retorno = [true,$i];
            }
        }
        return $retorno;
    }


    public function cambiarFuncion($nombreFuncion , $nuevoNombre , $nuevoPrecio){
        $retorno = $this->encontrarFuncion($nombreFuncion);
        $funciones = $this->getFunciones();
        if ($retorno[0] == true) {
            $funciones[$retorno[1]]["nombre"] = $nuevoNombre;
            $funciones[$retorno[1]]["precio"] = $nuevoPrecio;
        }else{
            echo "No se puede cambiar una funcion que no existe\n";
        }
        $this->setFunciones($funciones);
    }


    public function mostrarFunciones(){
        $funciones = $this->getFunciones();
        for ($i=0; $i < count($funciones) ; $i++) { 
            echo "Funcion: " . $i+1 . "\n";
            echo $funciones[$i]["nombre"] . "\n";
            echo $funciones[$i]["precio"] . "\n";
        }; 
    }

    public function __toString(){
        $nombreTeatro = $this->getNombreTeatro();
        $direccionTeatro = $this->getDireccion();
        
        return $this->mostrarFunciones() . 
        "Nombre Teatro: " . $nombreTeatro . "\n" .
         "Direccion Teatro: " .   $direccionTeatro;
    }

 }




?>