<?php

include_once 'Teatro_Instalacion.php';
include_once 'Funcion.php';
include_once 'Cine.php';
include_once 'Teatro.php';
include_once 'Musicales.php';

//Peliculas
$peli1 = new Cine("Madagascar" , [10,00] ,30,500,"Infantil" , "USA");
$peli2 = new Cine("Raton Perez" , [11,50] , 50 , 350  , "Infantil" , "ARG");
//Musicales
$musical1 = new Musical("El baile de los Cisnes" , [14,15] , 35 , 800,"ArLovsky" , 12);
$musical2 = new Musical("High School Musical" , [21,25] ,25 ,540,"Bruneger" , 10);
//Teatror
$teatro1 = new Obra_Teatro("No me sirve" , [16,35] , 35 , 500);
$teatro2 = new Obra_Teatro("La web del siglo" , [18,25] ,20 ,750);


$funciones = [$peli1,$peli2,$musical1,$musical2,$teatro1,$teatro2]; 


$teatro = new Teatro_Instalacion("Elu", $funciones, "Damas patricias 1767");

do {
    echo "¿Que desea hacer? \n
    1) Cambiar Precio/Nombre de una Funcion\n
    2) Cambiar el nombre del Teatro\n
    3) Cambiar la direccion del Teatro\n  
    4) Ver las Funciones\n
    5) Ver el nombre del Teatro\n
    6) Ver la direccion del Teatro\n
    7) Cargar Pelicula\n
    8) Cargar Obra Teatro\n
    9) Cargar Musical\n
    10) Dar Costos\n
    0 Salir
    ";
    
    $variable = trim(fgets(STDIN));
    
    if ($variable == 1) {
        $teatro->mostrarFunciones();
        echo "¿Que funcion desea cambiar?: \n";
        $nombreFuncion = trim(fgets(STDIN));
        echo "¿Que nombre le quiere agregar?";
        $nuevoNombre = trim(fgets(STDIN));
        echo "¿Que precio le quiere agregar?";
        $nuevoPrecio = trim(fgets(STDIN));
        $teatro->cambiarFuncion($nombreFuncion,$nuevoNombre,$nuevoPrecio);
    }elseif ($variable == 2) {
        echo "¿Que nombre le quiere poner al teatro?";
        $nombreTeatro = trim(fgets(STDIN));
        $teatro->setNombreTeatro($nombreTeatro);
    }elseif ($variable == 3) {
        echo "¿Que direccion le quiere poner al teatro?";
        $direccionTeatro = trim(fgets(STDIN));
        $teatro->setDireccion($direccionTeatro);
    }elseif ($variable == 4) {
        $teatro->mostrarFunciones();
    }elseif ($variable == 5) {
        echo $teatro->getNombreTeatro();
    }elseif ($variable == 6) {
        echo $teatro->getDireccion();
    }elseif($variable == 7){
        $hora = [];
        echo "Ingrese nombre de la pelicula: ";
        $nombre = trim(fgets(STDIN)); 
        echo "Hora de inicio: ";
        $hora[0] = trim(fgets(STDIN));  
        echo "Minutos de inicio: "; 
        $hora[1] = trim(fgets(STDIN));
        echo "Ingrese duracion (en minutos): ";
        $duracion = trim(fgets(STDIN));
        echo "Ingrese el precio: ";
        $precio = trim(fgets(STDIN));
        echo "Ingrese el genero de la pelicula: ";
        $genero = trim(fgets(STDIN));
        echo "Ingrese pais: ";
        $pais = trim(fgets(STDIN));
        $teatro->cargarFuncionesPelicula($nombre,$hora,$duracion,$precio,$genero,$pais);
    }elseif($variable == 8){
        $hora = [];
        echo "Ingrese nombre de la obra: ";
        $nombre = trim(fgets(STDIN)); 
        echo "Hora de inicio: ";
        $hora[0] = trim(fgets(STDIN));  
        echo "Minutos de inicio: "; 
        $hora[1] = trim(fgets(STDIN));
        echo "Ingrese duracion (en minutos): ";
        $duracion = trim(fgets(STDIN));
        echo "Ingrese el precio: ";
        $precio = trim(fgets(STDIN));
        
        $teatro->cargarFuncionesTeatro($nombre,$hora,$duracion,$precio);
    }elseif ($variable == 9) {
        $hora = [];
        echo "Ingrese nombre del musical: ";
        $nombre = trim(fgets(STDIN)); 
        echo "Hora de inicio: ";
        $hora[0] = trim(fgets(STDIN));  
        echo "Minutos de inicio: "; 
        $hora[1] = trim(fgets(STDIN));
        echo "Ingrese duracion (en minutos): ";
        $duracion = trim(fgets(STDIN));
        echo "Ingrese el precio: ";
        $precio = trim(fgets(STDIN));
        echo "Director: ";
        $director = trim(fgets(STDIN));
        echo "Cantidad ACTORES: ";
        $actores = trim(fgets(STDIN));
        $teatro->cargarFuncionesMusicales($nombre,$hora,$duracion,$precio,$director,$actores);
    }elseif ($variable == 10) {
        echo $teatro->darCostos();
    }
    
} while ($variable != 0);

?>