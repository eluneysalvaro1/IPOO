
<?php

include_once 'teatro.php';

$teatro = new Teatro("Elu" , "Damas patricias 1767" , ["nombre" => "Mago de oz" , "precio" => 950]);
$teatro->agregarFuncion("Perro loco" ,500 );
$teatro->agregarFuncion("Perro" ,100 );
$teatro->agregarFuncion("Perro" ,100 );
echo $teatro->__toString();
$teatro->cambiarFuncion("Perro" , "Payaso Asesino" , 900);
echo $teatro->__toString();
?>