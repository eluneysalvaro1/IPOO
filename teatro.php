<?php

class Teatro{

    private $nombreTeatro;
    private $direccion;
    private $funcion;


    public function __construct($nombreTeatro,$direccion,$funcion){
        $this->nombreTeatro = $nombreTeatro;
        $this->direccion = $direccion;
        
        /**Funciones */
        $this->funciones[0] =  $funcion;

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

    public function setFuncion($funcion){
        $this->funciones = $funcion;
    }
    public function getFuncion(){
        return $this->funciones;
    }


    public function agregarFuncion($nombreFuncion,$precioFuncion){
        $compruebaFuncion = $this->localizarFuncion($nombreFuncion);

        if ($compruebaFuncion[0] == true) {
            echo "No se puede agregar tal funcion otra vez: " . $nombreFuncion . "\n";
        }elseif($compruebaFuncion[0] == false){
            $cantidad = count($this->funciones);
            $this->funciones[$cantidad] = ["nombre" => $nombreFuncion , "precio" => $precioFuncion];
            return $this->funciones;
        }
        
    }

    private function localizarFuncion($nombreFuncion){
        $retorno = [false , 0];
        for ($i=0; $i < count($this->funciones) ; $i++) { 
            if ($this->funciones[$i]["nombre"] == $nombreFuncion ) {
                $retorno = [true , $i];
            }else{
                $retorno = [false, -1];
            }
        }
        return $retorno;
    }


    public function cambiarFuncion($nombreFuncion,$nuevoNombre , $nuevoPrecio){
       $compruebo = $this->localizarFuncion($nombreFuncion);
       $indice = $compruebo[1]; 
       if ($compruebo[0] == false) {
           echo "No se puede cambiar una funcion que no existe \n";
       }else{
           $this->funciones[$indice]["nombre"] = $nuevoNombre;
           $this->funciones[$indice]["precio"] = $nuevoPrecio; 
       };
    
    }


    private function mostrarFunciones(){
        for ($i=0; $i < count($this->funciones); $i++) { 
            echo "La funcion numero: " . $i + 1 . "\n";
            echo "Nombre de la Funcion: " . $this->funciones[$i]["nombre"]. "\n";
            echo "Precio de la Funcion: " . $this->funciones[$i]["precio"]. "\n";
        };
    }



    public function __toString(){

        return 
            "Las funciones son: \n" . $this->mostrarFunciones() . "\n" .
            "El teatro se llama: " . $this->nombreTeatro . "\n" .
            "La direccion es: " . $this->direccion . "\n" ;  
            }           

}





?>