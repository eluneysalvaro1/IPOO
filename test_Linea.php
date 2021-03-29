<?php

include_once "linea.php";

$linea = new Linea(5,8,3,1);

$linea->mueveDerecha(3);
echo $linea->__toString();
echo "\n";
$linea->mueveIzquierda(3);
echo $linea->__toString();
echo "\n";
$linea->mueveArriba(5);
echo $linea->__toString();
echo "\n";
$linea->mueveAbajo(5);
echo $linea->__toString();



?>