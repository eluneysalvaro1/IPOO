<?php

$celulares = [
    "Moto G6",
    "Samsung J7",
    "LG K9",
    "iPhone SE",
    "Galaxy A9"
]; 

$valor = [
    "22030.90",
    "10500.00",
    "27999.00",
    "38105.00",
    "17000.80"
]; 

echo "Que celular le interesa ver?"; 
$numero = trim(fgets(STDIN));  
$verdaderoNumero = $numero - 1;
echo "El modelo: " . $celulares[$verdaderoNumero] . " Sale: " . $valor[$verdaderoNumero]; 

function recibeRiki($valor){
    $suma = 0; 
    for ($i=0; $i < count($valor) ; $i++) { 
        $suma = $suma + $valor[$i];
    };
    return $suma;
}; 

echo "\ncosto total " . recibeRiki($valor);