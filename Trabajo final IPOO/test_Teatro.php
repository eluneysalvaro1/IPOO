<?php
include_once 'ORM/bdTeatro.php';
include_once 'ORM/Teatro_Instalacion.php';
include_once 'ORM/Funcion.php';
include_once 'ORM/Cine.php';
include_once 'ORM/Musical.php';
include_once 'ORM/Teatro.php';
include_once 'transaccion/abmTeatro.php';
include_once 'transaccion/abmFuncion.php'; 
include_once 'transaccion/abmMusical.php'; 
include_once 'transaccion/abmCine.php'; 
include_once 'transaccion/abmTeatro_obra.php'; 


//CREAMOS LA BASE DE DATOS
$baseDatos = new BaseDatos(); 

//CREO LOS ARRAYS CON LAS CLAVES

// $teatroInstalacion1 = [
//     'idTeatro' => 1 ,
//     'nombreTeatro' => "Mis amigos y yo",
//     'direccion' => "9 de Julio 1568"
// ]; 

// $cine1 = [
//     'idFuncion' => "",
//     'nombre' => "No se olviden de avisarme",
//     'horaInicio' => 12,
//     'duracion' => 30,
//     'precio' => 350,
//     'idTeatro' => 1,
//     'genero' => "Fantasia",
//     'pais' => "Argentina"
// ];

// $musical1 = [
//     'idFuncion' => "",
//     'nombre' => "Tranquilo voy en subte",
//     'horaInicio' => 16,
//     'duracion' => 15,
//     'precio' => 650,
//     'idTeatro' => 1,
//     'director' => "Tripalosky",
//     'cantidadActores' => 15
// ];


//CREO LOS OBJETOS DE CADA UNO


//LES CARGO LA INFORMACION

// $cine->cargar($cine1); 
// $teatro->cargar($teatro1);
// $musical->cargar($musical1); 

//AGREGO LA INFORMACION DE A UNO

//AGREGAR TEATRO 
// $abm = new abmTeatro();
// $abm->agregarTeatro($teatroInstalacion1);
// $teatro = $abm->seleccionTeatro(1);
// echo $abm->modificarTeatro($teatro, "Rodolfo" , "Mi casa");  
// $abm->eliminarTeatro($teatro); 

//FUNCIONES 

// $cine2 = [
//     'idFuncion' => "",
//     'nombre' => "Hole",
//     'horaInicio' => 15,
//     'duracion' => 30,
//     'precio' => 850,
//     'idTeatro' => 1,
//     'genero' => "Drama",
//     'pais' => "Brasil"
// ];

// $abmCine->agregarFuncion($cine1); 
// $abmCine->agregarFuncion($cine2); 
// $objCine = $abmCine->seleccionFuncion(1); 
// $abmCine->modificarFuncion($objCine, $cine2); 
// $abmCine->eliminarFuncion($objCine); 

// $musical2 = [
//     'idFuncion' => 14,
//     'nombre' => "chuirmon",
//     'horaInicio' => 12,
//     'duracion' => 30,
//     'precio' => 800,
//     'idTeatro' => 1,
//     'director' => "Renatto",
//     'cantidadActores' => 18
// ];


// $abmMusical = new abmMusical(); 
// $abmMusical->listarFunciones(""); 

//  $abmMusical->agregarFuncion($musical1); 
// $objMusical = $abmMusical->seleccionFuncion(14); 
// // $abmMusical->modificarFuncion($objMusical , $musical2); 
// $abmMusical->eliminarFuncion($objMusical);

// $teatro1 = [
//     'idFuncion' => "",
//     'nombre' => "perro callejero",
//     'horaInicio' => 9,
//     'duracion' => 50,
//     'precio' => 452,
//     'idTeatro' => 1,
//     'escritor' => 'Courtois'
// ];

// $abmTeatro = new abmObra_Teatro(); 
// $abmTeatro->agregarFuncion($teatro1); 
// $abmTeatro->listarFunciones(""); 
// $abmTeatro->agregarFuncion($cine2); 
// $objCine = $abmTeatro->seleccionFuncion(1); 
// $abmTeatro->modificarFuncion($objCine, $cine2); 
// $abmCine->eliminarFuncion($objCine); 


/////////////////////////////// DAR COSTOS

// $abm->eliminarTeatro($teatre); 

// $abmCine = new abmCine(); 
// $abmCine->listarFunciones(""); 


// $teatro = $abm->seleccionTeatro(1);
// echo $teatro->darCostos(); 

do {
    echo "¿Que desea hacer? \n
    1) Cargar Pelicula\n
    2) Cargar Obra Teatro\n
    3) Cargar Musical\n
    4) Cambiar datos de una Funcion\n
    5) Cambiar datos del Teatro\n
    6) Ver las Funciones\n
    7) Ver datos del Teatro\n
    8) Dar Costos teatro\n
    9) Eliminar Funcion\n
    0 Salir
    ";
    
    $variable = trim(fgets(STDIN));
    
    if ($variable == 1) {
        $abmCine = new abmCine(); 
        echo "Ingrese un nombre: \n";
        $nombre = trim(fgets(STDIN)); 
        echo "Ingrese hora de Inicio (en horas): \n";
        $horaInicio = trim(fgets(STDIN)); 
        echo "Ingrese la duracion (en minutos): \n";
        $duracion = trim(fgets(STDIN)); 
        echo "Ingrese precio: \n";
        $precio = trim(fgets(STDIN)); 
        echo "Ingrese genero: \n"; 
        $genero = trim(fgets(STDIN)); 
        echo "Ingrese país: \n";
        $pais = trim(fgets(STDIN)); 
        $cine1 = [
            'idFuncion' => "",
            'nombre' => $nombre,
            'horaInicio' => $horaInicio,
            'duracion' => $duracion,
            'precio' => $precio,
            'idTeatro' => 1,
            'genero' => $genero,
            'pais' => $pais
        ];
        $abmCine->agregarFuncion($cine1); 
        
    }elseif ($variable == 2) {
        $abmObra = new abmObra_Teatro(); 
        echo "Ingrese un nombre: \n";
        $nombre = trim(fgets(STDIN)); 
        echo "Ingrese hora de Inicio (en horas): \n";
        $horaInicio = trim(fgets(STDIN)); 
        echo "Ingrese la duracion (en minutos): \n";
        $duracion = trim(fgets(STDIN)); 
        echo "Ingrese precio: \n";
        $precio = trim(fgets(STDIN)); 
        echo "Ingrese escritor: \n";
        $escritor = trim(fgets(STDIN));
        $obra1 = [
            'idFuncion' => "",
            'nombre' => $nombre,
            'horaInicio' => $horaInicio,
            'duracion' => $duracion,
            'precio' => $precio,
            'idTeatro' => 1,
            'escritor' => $escritor
        ];
        $abmObra->agregarFuncion($obra1); 
    }elseif ($variable == 3) {
        $abmMusical = new abmMusical(); 
        echo "Ingrese un nombre: \n";
        $nombre = trim(fgets(STDIN)); 
        echo "Ingrese hora de Inicio (en horas): \n";
        $horaInicio = trim(fgets(STDIN)); 
        echo "Ingrese la duracion (en minutos): \n";
        $duracion = trim(fgets(STDIN)); 
        echo "Ingrese precio: \n";
        $precio = trim(fgets(STDIN)); 
        echo "Ingrese director: \n"; 
        $director = trim(fgets(STDIN)); 
        echo "Ingrese cantidad actores: \n";
        $ca = trim(fgets(STDIN)); 
        $musical1 = [
            'idFuncion' => "",
            'nombre' => $nombre,
            'horaInicio' => $horaInicio,
            'duracion' => $duracion,
            'precio' => $precio,
            'idTeatro' => 1,
            'director' => $director,
            'cantidadActores' => $ca
        ];
        $abmMusical->agregarFuncion($musical1); 
    }elseif ($variable == 4) {
        echo "¿Que tipo de funcion quiere modificar? (Musical = 1 / Obra teatral = 2 / Cine = 3): \n"; 
        $respuesta = trim(fgets(STDIN)); 
        if ($respuesta == 1) {
            $abmMusical = new abmMusical();
            echo "Ingrese el ID de la funcion: \n";
            $id = trim(fgets(STDIN)); 
            if ($musical = $abmMusical->seleccionFuncion($id)) {
                echo "Ingrese un nombre: \n";
                $nombre = trim(fgets(STDIN)); 
                echo "Ingrese hora de Inicio (en horas): \n";
                $horaInicio = trim(fgets(STDIN)); 
                echo "Ingrese la duracion (en minutos): \n";
                $duracion = trim(fgets(STDIN)); 
                echo "Ingrese precio: \n";
                $precio = trim(fgets(STDIN)); 
                echo "Ingrese director: \n"; 
                $director = trim(fgets(STDIN)); 
                echo "Ingrese cantidad actores: \n";
                $ca = trim(fgets(STDIN)); 
                $musicalNuevo = [
                    'idFuncion' => $id,
                    'nombre' => $nombre,
                    'horaInicio' => $horaInicio,
                    'duracion' => $duracion,
                    'precio' => $precio,
                    'idTeatro' => 1,
                    'director' => $director,
                    'cantidadActores' => $ca
                ];
                $abmMusical->modificarFuncion($musical,$musicalNuevo); 
            }else{
                echo "No existe esa funcion\n";
            }
             
        }elseif ($respuesta == 2) {
            $abmTeatral = new abmObra_Teatro();
            echo "Ingrese el ID de la funcion: \n";
            $id = trim(fgets(STDIN)); 
            if ($obraTeatro = $abmTeatral->seleccionFuncion($id)) {
                echo "Ingrese un nombre: \n";
                $nombre = trim(fgets(STDIN)); 
                echo "Ingrese hora de Inicio (en horas): \n";
                $horaInicio = trim(fgets(STDIN)); 
                echo "Ingrese la duracion (en minutos): \n";
                $duracion = trim(fgets(STDIN)); 
                echo "Ingrese precio: \n";
                $precio = trim(fgets(STDIN)); 
                echo "Ingrese escritor: \n";
                $escritor = trim(fgets(STDIN));
                $obraNueva = [
                    'idFuncion' => $id,
                    'nombre' => $nombre,
                    'horaInicio' => $horaInicio,
                    'duracion' => $duracion,
                    'precio' => $precio,
                    'idTeatro' => 1,
                    'escritor' => $escritor
                ];
                $abmTeatral->modificarFuncion($obraTeatro,$obraNueva); 
            }else{
                echo "No existe esa funcion\n";
            }
        }elseif ($respuesta == 3) {
            $abmCinee = new abmCine();
            echo "Ingrese el ID de la funcion: \n";
            $id = trim(fgets(STDIN));
            if ($cinee = $abmCinee->seleccionFuncion($id)) {
                echo "Ingrese un nombre: \n";
                $nombre = trim(fgets(STDIN)); 
                echo "Ingrese hora de Inicio (en horas): \n";
                $horaInicio = trim(fgets(STDIN)); 
                echo "Ingrese la duracion (en minutos): \n";
                $duracion = trim(fgets(STDIN)); 
                echo "Ingrese precio: \n";
                $precio = trim(fgets(STDIN)); 
                echo "Ingrese genero: \n"; 
                $genero = trim(fgets(STDIN)); 
                echo "Ingrese país: \n";
                $pais = trim(fgets(STDIN)); 
                $cine2 = [
                    'idFuncion' => $id,
                    'nombre' => $nombre,
                    'horaInicio' => $horaInicio,
                    'duracion' => $duracion,
                    'precio' => $precio,
                    'idTeatro' => 1,
                    'genero' => $genero,
                    'pais' => $pais
                ];
                $abmCinee->modificarFuncion($cinee,$cine2); 
            }else {
                echo "No existe esa funcion\n"; 
            }
        }
    }elseif ($variable == 5) {
        $abm = new abmTeatro();
        $teatro = $abm->seleccionTeatro(1);
        echo "Ingrese Nombre nuevo: \n";
        $nombre = trim(fgets(STDIN)); 
        echo "Ingrese direccion nueva: \n";
        $direccion = trim(fgets(STDIN));
        $abm->modificarTeatro($teatro,$nombre,$direccion);
    }elseif ($variable == 6) {

        $abmCine = new abmCine();
        $abmTeatro = new abmObra_Teatro();
        $abmMusical = new abmMusical(); 

        $abmCine->listarFunciones("");
        $abmTeatro->listarFunciones("");
        $abmMusical->listarFunciones("");

    }elseif($variable == 7){

        $abmTeatroInstalacion = new abmTeatro();
        $teatroo = $abmTeatroInstalacion->seleccionTeatro(1);
        print_r($teatroo); 

    }elseif($variable == 8){
        $abmTeatroInstalacion = new Teatro_Instalacion();
        $valor = $abmTeatroInstalacion->darCostos();
        echo "Costo: " . $valor;
    }elseif($variable == 9){
        echo "¿Que tipo de espectaculo quiere eliminar? (Musical = 1 / Obra teatral = 2 / Cine = 3): \n";
       $rta = trim(fgets(STDIN)); 
        
       echo "Ingrese su ID: \n"; 
       $id = trim(fgets(STDIN)); 
       if ($rta == 1) {
           $abmMusical = new abmMusical(); 
           $objMusical = $abmMusical->seleccionFuncion($id);
           $abmMusical->eliminarFuncion($objMusical);
       }elseif ($rta == 2) {
           $abmTeatro = new abmObra_Teatro(); 
           $objTeatro = $abmTeatro->seleccionFuncion($id); 
           $abmTeatro->eliminarFuncion($objCine); 
       }elseif ($rta == 3) {
            $abmCine = new abmCine(); 
            $objCine = $abmCine->seleccionFuncion($id); 
            $abmCine->eliminarFuncion($objCine); 
       }
    }
} while ($variable != 0);



?>