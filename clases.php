<?php

class NombreClase{

    //ATRIBUTOS

    private $color;
    static $atributo;

    //METODOS

    public function __construct($x,$y){
        $this->coordenada_x = $x;
        $this->coordenada_y = $y;
    }
    public function __destruct(){
        echo "hola";
    }

    public function getvariable (){

    }
    public function setvariable($valorVariable){

    }
    public function __toString(){
        $cadena = "hola";

        return $cadena;
    }
    static function c_1(){
        
    }

}



class Persona{
    private $nombre;
    private $peso;
    private $altura;
    private $sexo; 

    public function __construct($nombre,$peso,$altura,$sexo){
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->altura = $altura; 
        $this->sexo = $sexo;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function sePpeso($peso){
        $this->peso = $peso;
    }
    public function getPeso(){
        return $this->peso;
    }

    public function setAltura($altura){
        $this->altura = $altura;
    }
    public function getAltura(){
        return $this->altura;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function getSexo(){
        return $this->sexo;
    }



    public function comunicar(){
        $comunicado = "Hola";
        return $comunicado;
    }

    public function moverse(){
        $movimiento = "Moviendome";
        return $movimiento;
    }

    public function comer(){
        $comiendo = "ñam ñam ñam";
        return $comiendo;
    }

    public function dormir(){
        $dormir = "ZzZzZzZz";
        return $dormir;
    }

}



?>