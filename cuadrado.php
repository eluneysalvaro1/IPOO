<?php

class Cuadrado{
    private $vertices;

    private $pAX;
    private $pAY;

    private $pBX;
    private $pBY;

    private $pCX;
    private $pCY;

    private $pDX;
    private $pDY;



    public function __construct($pAX,$pAY,$pBX,$pBY,$pCX,$pCY,$pDX,$pDY){
        $this->vertices[0]["puntoAx"] = $pAX;
        $this->vertices[0]["puntoAy"] = $pAY;

        $this->vertices[1]["puntoBx"] = $pBX;
        $this->vertices[1]["puntoBy"] = $pBY;
        
        $this->vertices[2]["puntoCx"] = $pCX;
        $this->vertices[2]["puntoCy"] = $pCY;

        $this->vertices[3]["puntoDx"] = $pDX;
        $this->vertices[3]["puntoDy"] = $pDY;
    }


    //METODOS ACCESO PUNTO A
    public function setPuntoAx($puntoAX){
            $this->vertices[0]["puntoAx"] = $puntoAX;
        }
    public function getPuntoAx(){
            return $this->vertices[0]["puntoAx"];
        }

    public function setPuntoAy($puntoAy){
            $this->vertices[0]["puntoAy"] = $puntoAy;
        }
    public function getPuntoAy(){
            return $this->vertices[0]["puntoAy"];
        }        

    //METODOS ACCESO PUNTO B
    public function setPuntoBx($puntoBX){
        $this->vertices[1]["puntoBx"] = $puntoBX;
    }
    public function getPuntoBx(){
        return $this->vertices[1]["puntoBx"];
    }
    public function setPuntoBy($puntoBY){
        $this->vertices[1]["puntoBy"] = $puntoBY;
    }
    public function getPuntoBy(){
        return $this->vertices[1]["puntoBy"];
    }

    //METODOS ACCESO PUNTO C
    public function setPuntoCx($puntoCX){
        $this->vertices[2]["puntoCx"] = $puntoCX;
    }
    public function getPuntoCx(){
        return $this->vertices[2]["puntoCx"];
    }
    public function setPuntoCy($puntoCY){
        $this->vertices[2]["puntoCy"] = $puntoCY;
    }
    public function getPuntoCy(){
        return $this->vertices[2]["puntoCy"];
    }

    //METODOS ACCESO PUNTO D
    public function setPuntoDx($puntoDX){
        $this->vertices[3]["puntoDx"] = $puntoDX;
    }
    public function getPuntoDx(){
        return $this->vertices[3]["puntoDx"];
    }
    public function setPuntoDy($puntoDY){
        $this->vertices[3]["puntoDy"] = $puntoDY;
    }
    public function getPuntoDy(){
        return $this->vertices[3]["puntoDy"];
    }



    public function area(){
        $ancho = $this->vertices[0]["puntoAx"] - $this->vertices[2]["puntoCx"];
        $alto = $this->vertices[0]["puntoAy"] - $this->vertices[1]["puntoBy"];   
        return $ancho * $alto;
    }

    public function desplazar($punto){
        if ($punto > 0 ) {
            $this->vertices[0]["puntoAx"] = $this->vertices[0]["puntoAx"] + $punto;
            $this->vertices[0]["puntoAy"] = $this->vertices[0]["puntoAy"] + $punto;
            $this->vertices[1]["puntoBx"] = $this->vertices[1]["puntoBx"] + $punto;
            $this->vertices[1]["puntoBy"] = $this->vertices[1]["puntoBy"] + $punto;
            $this->vertices[2]["puntoCx"] = $this->vertices[2]["puntoCx"] + $punto;
            $this->vertices[2]["puntoCy"] = $this->vertices[2]["puntoCy"] + $punto;
            $this->vertices[3]["puntoDx"] = $this->vertices[3]["puntoDx"] + $punto;
            $this->vertices[3]["puntoDy"] = $this->vertices[3]["puntoDy"] + $punto;
        }elseif ($punto < 0) {
            $this->vertices[0]["puntoAx"] = $this->vertices[0]["puntoAx"] - $punto;
            $this->vertices[0]["puntoAy"] = $this->vertices[0]["puntoAy"] - $punto;
            $this->vertices[1]["puntoBx"] = $this->vertices[1]["puntoBx"] - $punto;
            $this->vertices[1]["puntoBy"] = $this->vertices[1]["puntoBy"] - $punto;
            $this->vertices[2]["puntoCx"] = $this->vertices[2]["puntoCx"] - $punto;
            $this->vertices[2]["puntoCy"] = $this->vertices[2]["puntoCy"] - $punto;
            $this->vertices[3]["puntoDx"] = $this->vertices[3]["puntoDx"] - $punto;
            $this->vertices[3]["puntoDy"] = $this->vertices[3]["puntoDy"] - $punto;
        }
        return $this->vertices;
    }

    public function aumentarTamaño($numeroAumento){
            $this->vertices[0]["puntoAx"] = $this->vertices[0]["puntoAx"] - $numeroAumento;
            $this->vertices[0]["puntoAy"] = $this->vertices[0]["puntoAy"] - $numeroAumento;
            $this->vertices[1]["puntoBx"] = $this->vertices[1]["puntoBx"] - $numeroAumento;
            $this->vertices[1]["puntoBy"] = $this->vertices[1]["puntoBy"] + $numeroAumento;
            $this->vertices[2]["puntoCx"] = $this->vertices[2]["puntoCx"] + $numeroAumento;
            $this->vertices[2]["puntoCy"] = $this->vertices[2]["puntoCy"] - $numeroAumento;
            $this->vertices[3]["puntoDx"] = $this->vertices[3]["puntoDx"] + $numeroAumento;
            $this->vertices[3]["puntoDy"] = $this->vertices[3]["puntoDy"] + $numeroAumento;

            return $this->vertices;
    }

    public function __toString(){
            return  
            "Punto a: " .
            $this->vertices[0]["puntoAx"] .
            $this->vertices[0]["puntoAy"]
            . "\n Punto b: " .
            $this->vertices[1]["puntoBx"] .
            $this->vertices[1]["puntoBy"]
            . "\n Punto c: " .
            $this->vertices[2]["puntoCx"] . 
            $this->vertices[2]["puntoCy"] 
            . "\n Punto d: " .
            $this->vertices[3]["puntoDx"] . 
            $this->vertices[3]["puntoDy"]; 
    
        }
 }

?>
