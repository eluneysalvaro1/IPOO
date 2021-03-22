<?php

// class Animal{
//     private $especie; 
//     private $alimentacion;
//     private $mamifero;
//     private $fechaNacimiento;
//     private $peso;
//     private $raza;

//     public function __construct($especie,$alimentacion,$mamifero,$fechaNacimiento,$peso,$raza){
//         $this->especie = $especie;
//         $this->alimentacion = $alimentacion;
//         $this->mamifero = $mamifero;
//         $this->fechaNacimiento = $fechaNacimiento;
//         $this->peso = $peso;
//         $this->raza = $raza;
//     }

//     public function setEspecie($especie){
//         $this->especie = $especie;
//     }
//     public function getEspecie(){
//         return $this->especie;
//     }

//     public function setAlimentacion($alimentacion){
//         $this->alimentacion = $alimentacion;
//     }
//     public function getAlimentacion(){
//         return $this->alimentacion;
//     }

//     public function setMamiferos($mamiferos){
//         $this->mamiferos = $mamiferos;
//     }
//     public function getMamiferos(){
//         return $this->mamiferos;
//     }

//     public function setFechaNacimiento($fechaNacimiento){
//         $this->fechaNacimiento = $fechaNacimiento;
//     }
//     public function getFechaNacimiento(){
//         return $this->fechaNacimiento;
//     }

//     public function setPeso($peso){
//         $this->peso = $peso;
//     }
//     public function getPeso(){
//         return $this->peso;
//     }

//     public function setRaza($raza){
//         $this->raza = $raza;
//     }
//     public function getRaza(){
//         return $this->raza;
//     }

//     public function comunicacion(){
//         $especie = $this->getEspecie();
//         if ($especie == "perro") {
//             $comunicado = "GuauGuau...";
//         }else if($especie == "gato"){
//             $comunicado = "Miau miau";
//         }else if($especie == "ave"){
//             $comunicado = "pio pio";
//         };

//         return $comunicado;
//     }

//     public function __toString(){
//         return "Alimentacion: " . $this->getAlimentacion();
//     }
        
    

// }


// class Calculadora{
//     private $num1; 
//     private $num2; 

//     public function __construct($num1,$num2){
//         $this->num1 = $num1;
//         $this->num2 = $num2;
//     }

//     public function setNum1($num1){
//         $this->num1 = $num1;
//     }
//     public function getNum1(){
//         return $this->num1;
//     }

//     public function setNum2($num2){
//         $this->num2 = $num2;
//     }
//     public function getNum2(){
//         return $this->num2;
//     }

//     public function sumar(){
//         $suma = $this->num1 + $this->num2;
//         return $suma;  
//     }

//     public function restar(){
//         $resta = $this->num1 - $this->num2; 
//         return $resta; 
//     }
//     public function multiplicar(){
//         $multiplicacion = $this->num1 * $this->num2; 
//         return $multiplicacion; 
//     }
//     public function dividir(){
//         $division = $this->num1 / $this->num2; 
//         return $division;
//     }

//     public function __toString(){
//         return "El resultado de su operacion es: " . $this->dividir() . "\n o " . $this->sumar() . "\n o " . $this->multiplicar() . "\n o " . $this->restar();
//     }
// }



// class Reloj{
//     private $hora; 

//     public function __construct($hora){
//         $this->hora = $hora;
//     }


//     public function setHora($hora){
//         $this->hora = $hora;
//     }
//     public function getHora(){
//         return $this->hora;
//     }


//     //METODOS
//     public function puesta_a_cero(){
//         $this->hora = 0;
//         $respueesta = $this->analogico($this->hora);
//         return $respueesta;
//     }

//     public function incremento(){
//         $this->hora = $this->hora + 1;
//         if ($this->hora == 86400) {
//              $this->hora = 0;
//              $respuesta = $this->analogico($this->hora);
//         }else{
//             $respuesta = $this->analogico($this->hora);
//         }
//         return $respuesta;
//     }

//     public function analogico(){
//         //HORAS
//         $horas = floor($this->hora / 3600) ;
//         //MINUTOS
//         $minutos = ($this->hora / 60 ) % 60; 
//         //SEGUNDOS
//         $segundos = $this->hora % 60;

//         return $horas . ":" . $minutos . ":" . $segundos;
//     }

//     public function __toString(){
//         $rta = $this->analogico($this->hora);
//         return $rta;
        
//     }
// }





// class Fecha{
//     private $dia;
//     private $mes;
//     private $anio;

//     public function __construct($dia, $mes,$anio){
//         $this->dia = $dia;
//         $this->mes = $mes;
//         $this->anio = $anio;
//     }

//         //METODOS

//     public function setDia($dia){
//                 $this->dia = $dia;
//         }
//     public function getDia(){
//                 return $this->dia;
//         }

//     public function setMes($mes){
//             $this->mes = $mes;
//     }
//     public function getMes(){
//             return $this->mes;
//     }

//     public function setAnio($anio){
//         $this->anio = $anio;
//     }
//     public function getAnio(){
//         return $this->anio;
//     }


//     public function bisiesto(){
//         if ($this->anio % 4 == 0) {
//             return true;
//         }else{
//             return false;
//         };
//     }

//     public function mesLargo(){
//         if ($this->mes == 1) {
//             $rta = "Enero";
//         }elseif($this->mes == 2){
//             $rta = "Febrero";
//         }elseif($this->mes == 3){
//             $rta = "Marzo";
//         }elseif($this->mes == 4){
//             $rta = "Abril";
//         }elseif($this->mes == 5){
//             $rta = "Mayo";
//         }elseif($this->mes == 6){
//             $rta = "Junio";
//         }elseif($this->mes == 7){
//             $rta = "Julio";
//         }elseif($this->mes == 8){
//             $rta = "Agosto";
//         }elseif($this->mes == 9){
//             $rta = "Septiembre";
//         }elseif($this->mes == 10){
//             $rta = "Octubre";
//         }elseif($this->mes == 11){
//             $rta = "Noviembre";
//         }elseif($this->mes == 12){
//             $rta = "Diciembre";
//         }
//         return $rta;
//     }

//     public function acortada(){
//         if ($this->bisiesto()) {
//             if ($this->dia == 29 && $this->mes ==2) {
//                 $muestra = "(" . $this->dia .  "/" . $this->mes . "/" . $this->anio . ")";
//             }else{
//                 $muestra = "NO ES COMPATIBLE LA FECHA INGRESADA";
//             }
//         }else{
//             $muestra = "(" . $this->dia .  "/" . $this->mes . "/" . $this->anio . ")";
//         }
//         return $muestra;
//     }

//     public function incremento($num, $diaFecha,$mesFecha,$anioFecha){
//         $diaNuevo = $diaFecha + $num; 
//         $mesNuevo = $mesFecha;
//         $anioNuevo = $anioFecha;
//         if ($diaNuevo > 30) {
//             $diaNuevo = 1; 
//             $mesNuevo++;
//         }elseif ($mesNuevo > 12) {
//             $anioNuevo++;
//         }
//         return "(" . $diaNuevo . "/" . $mesNuevo . "/" . $anioNuevo;
//     }

//     public function larga(){
//         $mesAnio = $this->mesLargo($this->mes);
//         return "(" . $this->dia . "de " . $mesAnio . " del " . $this->anio . ")"; 
//     }
// }



// class Login{
//     private $nombreUsuario;
//     private $contraseña;
//     private $frase;
//     private $contraseñasUno;
//     private $contraseñasDos;
//     private $contraseñasTres;
//     private $contraseñasCuatro;

//     public function __construct($nombreUsuario,$contraseña,$frase,$contraseñasUno,$contraseñasDos,$contraseñasTres,$contraseñasCuatro){
//         $this->nombreUsuario = $nombreUsuario;
//         $this->contraseña = $contraseña;
//         $this->frase = $frase;
//         $this->ingresadaUno = $contraseñasUno;
//         $this->ingresadaDos = $contraseñasDos;
//         $this->ingresadaTres = $contraseñasTres;
//         $this->ingresadaCuatro = $contraseñasCuatro;
//     }

//     public function setNombreUsuario($nombreUsuario){
//         $this->nombreUsuario = $nombreUsuario;
//     }
//     public function getNombreUsuario(){
//         return $this->nombreUsuario;
//     }

//     public function setContraseña($contraseña){
//         $this->contraseña = $contraseña;
//     }
//     public function getContraseña(){
//         return $this->contraseña;
//     }

//     public function setFrase($frase){
//         $this->frase = $frase;
//     }
//     public function getFrase(){
//         return $this->frase;
//     }

//     public function setIngresadaUno($ingresadaUno){
//         $this->ingresadaUno = $ingresadaUno;
//     }
//     public function getIngresadaUno(){
//         return $this->ingresadaUno;
//     }

//     public function setIngresadaDos($ingresadaDos){
//         $this->ingresadaDos = $ingresadaDos;
//     }
//     public function getIngresadaDos(){
//         return $this->ingresadaDos;
//     }

//     public function setIngresadaTres($ingresadaTres){
//         $this->ingresadaTres = $ingresadaTres;
//     }
//     public function getIngresadaTres(){
//         return $this->ingresadaTres;
//     }

//     public function setIngresadaCuatro($ingresadaCuatro){
//         $this->ingresadaCuatro = $ingresadaCuatro;
//     }
//     public function getIngresadaCuatro(){
//         return $this->ingresadaCuatro;
//     }




//     public function validar($contraseñaPrueba){
//         echo $this->frase;
//         if ($contraseñaPrueba == $this->contraseña) {
//             echo "Contraseña Correcta...";
//         }else{
//             echo "Contraseña Incorrecta...";
//         }
//     }


//     public function cambiarContraseña($contraseñaNueva){
//         if ($contraseñaNueva != $this->ingresadaUno && $contraseñaNueva != $this->ingresadaDos && $contraseñaNueva != $this->ingresadaTres && $contraseñaNueva != $this->ingresadaCuatro) {
//             if ($contraseñaNueva != $this->contraseña ) {
//                 $this->contraseña = $contraseñaNueva; 
//                 $this->ingresadaCuatro = $this->ingresadaTres;
//                 $this->ingresdaTres = $this->ingresadaDos;
//                 $this->ingresadaDos = $this->ingresadaUno;
//                 $this->ingresadasUno = $contraseñaNueva;
//                 echo "Cambio de contraseña correcto";
//             }else{
//                 echo "Ha ingresado su contraseña";
//             }
//         }
//     }   

//     public function __toString(){
//     return $this->nombreUsuario . " / contraseña: " . $this->contraseña;
//     }

// }



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