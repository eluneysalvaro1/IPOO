<?php

 class Teatro{
    private $nombreTeatro;
    private $direccion;
    private $funcion;

    public function __construct($nombreTeatro,$direccion,$funcion){
        $this->nombreTeatro = $nombreTeatro;
        $this->direccion = $direccion;
        $this->funciones = $funcion; 
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


    // private function encontrarFuncion($nombreFuncion){
    //     $funciones = $this->getFunciones();
    //     $retorno = [false,-1];
    //     for ($i=0; $i < count($funciones); $i++) { 
    //         if ($funciones[$i]["nombre"] == $nombreFuncion) {
    //             $retorno = [true,$i];
    //         }
    //     }
    //     return $retorno;
    // }


    // public function cambiarFuncion($nombreFuncion , $nuevoNombre , $nuevoPrecio){
    //     $retorno = $this->encontrarFuncion($nombreFuncion);
    //     $funciones = $this->getFunciones();
    //     if ($retorno[0] == true) {
    //         $funciones[$retorno[1]]["nombre"] = $nuevoNombre;
    //         $funciones[$retorno[1]]["precio"] = $nuevoPrecio;
    //     }else{
    //         echo "No se puede cambiar una funcion que no existe\n";
    //     }
    //     $this->setFunciones($funciones);
    // }


    // public function mostrarFunciones(){
    //     $funciones = $this->getFunciones();
    //     for ($i=0; $i < count($funciones) ; $i++) { 
    //         echo "Funcion: " . $i+1 . "\n";
    //         echo $funciones[$i]["nombre"] . "\n";
    //         echo $funciones[$i]["precio"] . "\n";
    //     }; 
    // }

    // public function __toString(){
    //     $nombreTeatro = $this->getNombreTeatro();
    //     $direccionTeatro = $this->getDireccion();
        
    //     return $this->mostrarFunciones() . 
    //     "Nombre Teatro: " . $nombreTeatro . "\n" .
    //      "Direccion Teatro: " .   $direccionTeatro;
    // }


//PARTE DOS DEL TP 2


    private function existeFuncion($funcion){
        $funciones = $this->getFunciones();
        $bandera = false;
        $i = 0;
        while ($bandera == false && $i < count($funciones)) {
            if ($funciones[$i]->getNombre() == $funcion) {
                $bandera = true;
            }
            $i++;
        }
        return $bandera;
    }   

    public function cambiarNombrePrecio($nombreFuncion,$nuevoNombre,$nuevoPrecio){
        $bandera = $this->existeFuncion($nombreFuncion);
        $funciones = $this->getFunciones();
        if ($bandera) {
            for ($i=0; $i < count($funciones); $i++) { 
                if ($funciones[$i]->getNombre() == $nombreFuncion) {
                    $funciones[$i]->setNombre($nuevoNombre);
                    $funciones[$i]->setPrecio($nuevoPrecio);
                };
            };
        }else{
            echo "ESA FUNCION NO EXISTE.. \n   \n  \n  \n";
        }
    }

    /**
     * TOMA DE VALOR UN ARRAY Y CONVIERTE SUS VALORES A MINUTOS, LUEGO LOS SUMA
     * TOMA EL VALOR DE LA HORA INICIO Y EL TIEMPO QUE DURA LA OBRA Y DEVUELVE EN UN ARRAY
     * LOS DOS VALORES.
     * 
     * 
     */

    private function cambioEstado($variable){
        $duracionObra = $variable->getDuracionObra();
        $tiempo = $variable->getHoraInicio();

        $hora = $tiempo[0] * 60;
        $minutos = $tiempo[1];

        $tiempo[0] = $hora + $minutos;
        $tiempo[1] = $hora + $minutos + $duracionObra;
        return $tiempo;
    }


    private function solapamiento($horaInicio){
        $funciones = $this->getFunciones();
        // $tiempo = $this->cambioEstado($horaInicio);
        $hore[0] = $horaInicio[0] * 60;
        $hore[1] = $horaInicio[1];
        $tiempo = $hore[0] + $hore[1]; 
        $nuevaHora = $horaInicio;
        $i = 0;
            do {
                if ($this->cambioEstado($funciones[$i])[0] < $tiempo && 
                $this->cambioEstado($funciones[$i])[1] > $tiempo  
                ) {
                echo "NO SE PUEDE AGREGAR ESA HORA A LA FUNCION..."; 
                echo "Cambie la hora: \n"; 
                $tiempoNuevo[0] = trim(fgets(STDIN));
                echo "Ingrese los minutos: ";
                $tiempoNuevo[1] = trim(fgets(STDIN));
                $hore[0] = $tiempoNuevo[0] * 60;
                $hore[1] = $tiempoNuevo[1];
                $tiempo = $hore[0] + $hore[1]; 
                }else{
                    $i++;
                }
            } while ($i < count($funciones));
            
        
        return $nuevaHora;
    }

    private function mostrarHoraNormal($hora){
        return $horaNormal = $hora[0] . ":" . $hora[1];
    }


    public function cargarFunciones($nombreFuncion){
        $bandera = $this->existeFuncion($nombreFuncion);
        $funciones = $this->getFunciones();
        if ($bandera) {
            echo "Esa funcion ya existe";
        }else{
            $nombre = $nombreFuncion;
            echo "¿Cual es el precio de la funcion?\n";
            $precio = trim(fgets(STDIN));
            echo "¿Cual es la hora de inicio?\n";
            $horaInicio = trim(fgets(STDIN));
            echo "¿Cuales son los minutos de inicio?\n";
            $minutosInicio = trim(fgets(STDIN));

            $tiempoInicioNuevaFuncion[0] = $horaInicio;
            $tiempoInicioNuevaFuncion[1] = $minutosInicio;

            echo "Ingrese (en minutos) la duracion de la funcion: ";
            $duracionObra = trim(fgets(STDIN));

            $horaInicio = $this->solapamiento($tiempoInicioNuevaFuncion);
            

            $funcion = new Funcion($nombre,$horaInicio,$duracionObra,$precio);
            $funciones[] = $funcion;
            $this->setFunciones($funciones);
        };

    }

    public function mostrarFunciones(){
        $funciones = $this->getFunciones();
        for ($i=0; $i < count($funciones); $i++) { 
            echo " \n########FUNCION " . $i+1 . "########\n";
            echo "Nombre: " . $funciones[$i]->getNombre() . "\n"; 
            echo "Precio: " . $funciones[$i]->getPrecio() . "\n";
            echo "Inicia a las: " . $this->mostrarHoraNormal($funciones[$i]->getHoraInicio()) . "\n";
            echo "Dura: " . $funciones[$i]->getDuracionObra() . "\n";
        };
    }


    public function __toString(){
        $nombreTeatro = $this->getNombreTeatro();
        $direccionTeatro = $this->getDireccion();

        return $nombreTeatro .  "\n" . $direccionTeatro . "\n" .  $this->mostrarFunciones();
    }



 }


 




?>