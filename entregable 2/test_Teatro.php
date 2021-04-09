
<?php

include_once 'teatro.php';

$teatro = new Teatro("Elu" , "Damas patricias 1767");


do {
    echo "¿Que desea hacer? \n
    1) Cambiar una funcion\n
    2) Cambiar el nombre del Teatro\n
    3) Cambiar la direccion del Teatro\n  
    4) Ver las Funciones\n
    5) Ver el nombre del Teatro\n
    6) Ver la direccion del Teatro\n
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
    };
    
} while ($variable != 0);






// switch ($variable) {
//     case '1':
        
//         break;

//     case '2':
        
//         break;

//     case '3':
        
//         break;

//     case '4':
        
//         break;

//     case '5':
        
//         break;

//     case '6':
        
//         break;

//     case '0':
//         echo "Saliendo...";
//         break;
// }

?>