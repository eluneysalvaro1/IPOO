<?php

function leerDatosCirco(){
    $datosCirco = []; 
    echo "Ingrese nombres: "; 
    $datosCirco["nombres"] = trim(fgets(STDIN)); 
    echo "Ingrese hora de inicio: "; 
    $datosCirco["inicio"] = trim(fgets(STDIN)); 
    echo "Ingrese el valor de la entrada: "; 
    $datosCirco["valor de entrada"] = trim(fgets(STDIN)); 
    echo "Ingrese la cantidad de payasos: "; 
    $datosCirco["cantidad de payasos"] = trim(fgets(STDIN)); 
 
    return $datosCirco;
}

print_r(leerDatosCirco()); 

