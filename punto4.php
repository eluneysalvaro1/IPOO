<?php

//FUNCIONES 

function cargarMascotas(){
    $cargarMascotas = []; 
    $i = 0; 
    do {
        echo "Ingrese el nombre de la mascota: "; 
        $cargarMascotas[$i]["nombre"] = trim(fgets(STDIN));
        echo "Ingrese la edad de la mascota: "; 
        $cargarMascotas[$i]["edad"] = trim(fgets(STDIN)); 
        echo "Ingrese el tipo de la mascota: "; 
        $cargarMascotas[$i]["tipo de mascota"] = trim(fgets(STDIN));
        
        echo "¿Quiere ingresar mas mascotas?: "; 
        $ingresoMascotas = trim(fgets(STDIN)); 

        $i++; 
    } while ($ingresoMascotas == "SI");
    return $cargarMascotas; 
};

function mostrarMascotas($arregloMultidimensional){
    $aux = 1;
    for ($i=0; $i < count($arregloMultidimensional) ; $i++) { 
        echo "Mascota" . $aux . ": " . $arregloMultidimensional[$i]["nombre"] . " es " . $arregloMultidimensional[$i]["tipo de mascota"] . " de " . $arregloMultidimensional[$i]["edad"] . " años";
        $aux++;
    }; 
}

function buscarPrimerMenorA($arregloMultidimensional , )



//PROGRAMA PRINCIPAL CON MENU

echo "Hola, bienvenido a la veterinaria virtual. Ingrese su opcion: ";
echo "\n( 1 )  Saber que mascota es menor a una edad que usted ingrese\n( 2 ) Mostrar a todas las mascotas ingresadas\n( 0 ) Salir";
$opciones = trim(fgets(STDIN)); 
cargarMascotas(); 

if ($opciones == 1) {
    
}elseif($opciones == 2){

}
