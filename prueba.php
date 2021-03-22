<?php
/*
    $coleccionLetras = []; 
    $coleccionLetras[0] = ["letra" => "H" , "descubierta" => false];
    $coleccionLetras[1] = ["letra" => "O" , "descubierta" => true];
    $coleccionLetras[2] = ["letra" => "L" , "descubierta" => false];
    $coleccionLetras[3] = ["letra" => "A" , "descubierta" => true];


function stringLetrasDescubiertas($coleccionLetras){
    $pal = "";
    for ($i=0; $i < count($coleccionLetras) ; $i++) { 
        if ($coleccionLetras[$i]["descubierta"] == true ) {
            $pal = $pal . $coleccionLetras[$i]["letra"];
        }else{
            $pal = $pal . "*";
        }
    };
    return $pal;
   };

$rta = stringLetrasDescubiertas($coleccionLetras);

echo $rta;
*/


$chau = "chau";


$hola = [];

$hola[1] = [
    "palabra" => "Hola"
];

echo strlen($hola[1]["palabra"]);


do {
    # code...
} while ($a <= 10);