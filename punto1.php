<?php 

function leerTemperatura($num){
    $arreglo = [];
    for ($i=0; $i < $num ; $i++) { 
        echo "Ingrese una temperatura: "; 
        $arreglo[$i] = trim(fgets(STDIN));
    }
    return $arreglo;
};

//almacena datos del tipo ENTERO 

function listarTemperaturas($array){
    for ($i=0; $i < count($array) ; $i++) { 
        echo $array[$i] . " " . "\n"; 
    };
};

function promTemperaturas($arregloTemperaturas){    
    $suma = 0;
    for ($i=0; $i < count($arregloTemperaturas) ; $i++) { 
        $suma = $suma + $arregloTemperaturas[$i];
    }
    $promedio = $suma / count($arregloTemperaturas);
    return $promedio;
};

function porcTemperaturasSuperiores($arregloTemperaturas , $temperaturaDeterminada){
   $contador = 0;
    for ($i=0; $i < count($arregloTemperaturas) ; $i++) { 
        if ($arregloTemperaturas[$i] > $temperaturaDeterminada ) {
            $contador = $contador + 1;
        }
    }
    $porcentaje = $contador * 100 / count($arregloTemperaturas);
    return $porcentaje;
}

function maxTemperaturas($arregloTemperaturas){
        $temperaturaMaxima = 0;
    for ($i=0; $i < count($arregloTemperaturas); $i++) { 
        if ($temperaturaMaxima < $arregloTemperaturas[$i]) {
            $temperaturaMaxima = $arregloTemperaturas[$i];
        };
    }
    return $temperaturaMaxima;
    
}

function minTemperaturas($arregloTemperaturas){
    $temperaturaMinima = 999999;
for ($i=0; $i < count($arregloTemperaturas); $i++) { 
    if ($temperaturaMinima > $arregloTemperaturas[$i]) {
        $temperaturaMinima = $arregloTemperaturas[$i];
    };
}
return $temperaturaMinima;

}

function extremosTemperatura($arregloTemperaturas){
    $temperaturaMaxima = 0;
    $temperaturaMinima = 999999;
    $nuevoArreglo = [];
    for ($i=0; $i < count($arregloTemperaturas); $i++) { 
        if ($arregloTemperaturas[$i] > $temperaturaMaxima) {
            $temperaturaMaxima = $arregloTemperaturas[$i];
            $nuevoArreglo["max"] = $arregloTemperaturas[$i]; 
        };
        if ($arregloTemperaturas[$i] < $temperaturaMinima) {
            $temperaturaMinima = $arregloTemperaturas[$i];
            $nuevoArreglo["min"] = $arregloTemperaturas[$i]; 
        };
    }
    return $nuevoArreglo;
}


echo "num: ";
$num = trim(fgets(STDIN)); 

 echo $rta1 = leerTemperatura($num);
echo listarTemperaturas($rta1) . "\n";  
echo "promedio: " . promTemperaturas($rta1). "\n"; 
echo "porcentaje temperaturas superiores: " . porcTemperaturasSuperiores($rta1, 30). "\n";
echo "temperatura minima:" . minTemperaturas($rta1). "\n";
echo "temperatura maxima: " . maxTemperaturas($rta1). "\n"; 
echo "extremos temperatura: " . print_r(extremosTemperatura($rta1)); 


