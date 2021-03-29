<?php
include_once "cuentaBancaria.php";

$cuenta = new CuentaBancaria(12,44041173,3500,35);

$cuenta->actualizarSaldo();
echo "\n" . $cuenta->__toString();
$cuenta->depositar(500);
echo "\n" . $cuenta->__toString();
$cuenta->retirar(600);
echo "\n" . $cuenta->__toString();

?>