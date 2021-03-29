<?php

class Linea{
    private $pA;
    private $pB;
    private $pC;
    private $pD;

    public function __construct($pA,$pB,$pC,$pD){
        $this->puntoA["x"] = $pA;
        $this->puntoA["y"] = $pA;
        $this->puntoB["x"] = $pB;
        $this->puntoB["y"] = $pB;
        $this->puntoC["x"] = $pC;
        $this->puntoC["y"] = $pC;
        $this->puntoD["x"] = $pD;
        $this->puntoD["y"] = $pD;
    }
    
    //PUNTO A
    public function setPuntoA($punto){
        $this->puntoA["x"] = $punto;
        $this->puntoA["y"] = $punto;
    }
    public function getPuntoA(){
        return $this->puntoA;
    }
    //PUNTO B
    public function setPuntoB($punto){
        $this->puntoB["x"] = $punto;
        $this->puntoB["y"] = $punto;
    }
    public function getPuntoB(){
        return $this->puntoB;
    }
    //PUNTO C
    public function setPuntoC($punto){
        $this->puntoC["x"] = $punto;
        $this->puntoC["y"] = $punto;
    }
    public function getPuntoC(){
        return $this->puntoC;
    }
    //PUNTO D
    public function setPuntoD($punto){
        $this->puntoD["x"] = $punto;
        $this->puntoD["y"] = $punto;
    }
    public function getPuntoD(){
        return $this->puntoD;
    }



    public function mueveDerecha($d){
        $this->puntoA["x"] = $this->puntoA["x"] + $d; 
        $this->puntoB["x"] = $this->puntoB["x"] + $d;
        $this->puntoC["x"] = $this->puntoC["x"] + $d;
        $this->puntoD["x"] = $this->puntoD["x"] + $d;
    }
    public function mueveIzquierda($d){
        $this->puntoA["x"] = $this->puntoA["x"] - $d; 
        $this->puntoB["x"] = $this->puntoB["x"] - $d;
        $this->puntoC["x"] = $this->puntoC["x"] - $d;
        $this->puntoD["x"] = $this->puntoD["x"] - $d;
    }
    public function mueveArriba($d){
        $this->puntoA["y"] = $this->puntoA["y"] + $d;     
        $this->puntoB["y"] = $this->puntoB["y"] + $d;     
        $this->puntoC["y"] = $this->puntoC["y"] + $d;    
        $this->puntoD["y"] = $this->puntoD["y"] + $d;
    }
    public function mueveAbajo($d){
        $this->puntoA["y"] = $this->puntoA["y"] - $d;     
        $this->puntoB["y"] = $this->puntoB["y"] - $d;     
        $this->puntoC["y"] = $this->puntoC["y"] - $d;    
        $this->puntoD["y"] = $this->puntoD["y"] - $d;
    }
    
    public function __toString(){
        return $this->puntoA["x"] . "," .
        $this->puntoA["y"]. ",\n" .
        $this->puntoB["x"]. "," .
        $this->puntoB["y"] . ",\n" .
        $this->puntoC["x"]. "," .
        $this->puntoC["y"] . ",\n" .
        $this->puntoD["x"] . "," .
        $this->puntoD["y"] . ","; 
    }

}



?>