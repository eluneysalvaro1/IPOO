<?php
include_once "linea.php";

$linea = new Linea(5,8,3,1);

echo "Hacia la Derecha: ";
$linea->mueveDerecha(3);
echo $linea->__toString();
echo "\n";
echo "Hacia la Izquierda: ";
$linea->mueveIzquierda(3);
echo $linea->__toString();
echo "\n";
echo "Hacia Arriba: ";
$linea->mueveArriba(5);
echo $linea->__toString();
echo "\n";
echo "Hacia Abajo: ";
$linea->mueveAbajo(5);
echo $linea->__toString();



?>