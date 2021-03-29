<?php 

include_once "cafetera.php";

$cafetera = new Cafetera(1000,250);
echo $cafetera->__toString();
$cafetera->llenarCafetera();
echo "\n" . $cafetera->__toString();
$cafetera->servirTaza(450);
echo "\n" . $cafetera->__toString();
$cafetera->vaciarCafetera();
echo "\n" . $cafetera->__toString();
$cafetera->agregarCafe(90);
echo "\n" . $cafetera->__toString(); 

?>