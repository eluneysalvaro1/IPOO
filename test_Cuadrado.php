<?php
include_once "cuadrado.php";

$cuadrado = new Cuadrado(1,1,1,4,4,1,4,4);

echo $cuadrado->area();

echo "\n";
$cuadrado->desplazar(5);
echo $cuadrado->__toString();
echo "\n";
$cuadrado->aumentarTamaño(3);
echo $cuadrado->__toString();


?>