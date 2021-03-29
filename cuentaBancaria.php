<?php

class CuentaBancaria{
    private $numeroCuenta;
    private $dni;
    private $saldoActual;
    private $interesAnual;

    public function __construct($numeroCuenta,$dni,$saldoActual,$interesAnual){
        $this->numeroCuenta = $numeroCuenta;
        $this->dni = $dni;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }

    public function setNumCuenta($nuevoNum){
        $this->numeroCuenta = $nuevoNum;
    }
    public function getNumCuenta(){
        return $this->numeroCuenta;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }
    public function getDni(){
        return $this->dni;
    }

    public function setSaldo($nuevoSaldo){
        $this->saldoActual = $nuevoSaldo;
    }
    public function getSaldo(){
        return $this->saldoActual;
    }

    public function setInteresAnual($nuevoInteres){
        $this->interesAnual = $nuevoInteres;
    }
    public function getInteresAnual(){
        return $this->interesAnual;
    }

    public function actualizarSaldo(){
        $this->saldoActual = $this->saldoActual + (($this->saldoActual * $this->interesAnual) / 100) / 365;
    }

    public function depositar($cantidad){
        $this->saldoActual = $this->saldoActual + $cantidad;
    }

    public function retirar($cant){
        if ($this->saldoActual == 0) {
            echo "Error... No tiene dinero en la cuenta \n";
        }elseif ($cant < $this->saldoActual || $cant == $this->saldoActual) {
            echo "Retiro con exito...\n";
            $this->saldoActual = $this->saldoActual - $cant;
        }
    }

    public function __toString(){
        return "Numero cuenta: " . $this->numeroCuenta . "\n" . "Dni: " . $this->dni ."\n" . "Saldo Actual: " . $this->saldoActual . "\n" . "Interes Anual: " . $this->interesAnual;        
    }

}




?>