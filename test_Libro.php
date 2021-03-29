<?php 

include_once "libro.php";

$libro = new Libro(26457841,"Rangial: La organizacion del nuevo mundo" , 2020, "EdiZur" , "Eluney" , "Salvaro");

$pArreglo = ["Juguete rabioso" , "Enamorado Tuyo" , "Rangial" , "Hachazo"];

$libro->perteneceEditorial("ZurEditoriales");
echo $libro->__toString();
$libro->iguales("Rangial" , $pArreglo);
echo $libro->__toString();
$libro->aniosDesdeEdicion();
echo $libro->__toString();




?>