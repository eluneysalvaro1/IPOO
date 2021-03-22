<?php


include_once "Animal.php";


// $fechaa = new Fecha(26,6,2002);

// echo $fechaa->acortada();
// echo "\n";
// echo $fechaa->larga();
// echo "\n";
// echo $fechaa->incremento(5,26,06,2002);


// $contra = new Login("EluneySalvaro" , "holaperro" , "saludar a tu perro" , "perro" , "correr" , "saltar" , "morir");

// // echo $contra->validar("holaperro");
// echo $contra->cambiarContraseña("pajero");
// echo $contra->cambiarContraseña("pajero");


$cuadrade = new Cuadrado(2,3,2,5,5,2,5,5);
echo $cuadrade->area();
echo "\n";
echo $cuadrade->__toString();
?>
