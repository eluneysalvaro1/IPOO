<?php 



class Obra_Teatro extends Funcion{

    private $idFuncion; 
    private $mensajeoperacion; 
    private $escritor; 

    public function __construct(){
        parent::__construct();  
        $this->escritor = ""; 
    }

  

    public function setmensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion = $mensajeoperacion;
	}
    
    public function getmensajeoperacion(){
        return $this->mensajeoperacion; 
    }

    public function getEscritor(){
        return $this->escritor;
    }


    public function setEscritor($escritor){
        $this->escritor = $escritor;
    }



    public function cargar($datosFuncion){
        parent::cargar($datosFuncion); 
        $this->setEscritor($datosFuncion['escritor']); 
    }

    public function buscar($idFuncion){
        $baseDatos = new BaseDatos(); 
        $consulta = "SELECT * FROM teatro WHERE idFuncion = " . $idFuncion;
        $respuesta = false;
        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                if ($row2 = $baseDatos->registro()) {
                    parent::buscar($idFuncion);
                    $this->setIdFuncion($row2['idFuncion']);
                    $respuesta = true;
                }
            }else{
                $this->setmensajeoperacion($baseDatos->getError());
            }
        }else{
            $this->setmensajeoperacion($baseDatos->getError());
        }
        return $respuesta;
    }


    public function listar($condicion = ""){
        $arregloFunciones = null;
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM teatro ";
        if($condicion != ""){
            $consulta = $consulta . ' WHERE ' . $condicion; 
        } 
        $consulta .= " order by idFuncion"; 
        if($baseDatos->iniciar()){
            if ($baseDatos->ejecutar($consulta)) {
                $arregloFunciones = array();
                while ($row2 = $baseDatos->registro()) {
                    $obj = new Obra_Teatro(); 
                    $obj->buscar($row2["idFuncion"]);
                    
                    array_push($arregloFunciones,$obj); 
                }
            }else{
                $this->setmensajeoperacion($baseDatos->getError());
            }
        }else{
            $this->setmensajeoperacion($baseDatos->getError());
        }
        return $arregloFunciones;
    }


    public function insertar(){
        $baseDatos = new BaseDatos();
        $respuesta = false;
        $escritor = $this->getEscritor();
        if (parent::insertar()) {
            $consulta = "INSERT INTO teatro(idFuncion, escritor) 
            VALUES ('" . parent::getIdFuncion() ."','" . $escritor . "')";
            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    $respuesta = true; 
                }else{
                    $this->setmensajeoperacion($baseDatos->getError());
                }
            }else{
                $this->setmensajeoperacion($baseDatos->getError());
            }
        }
        return $respuesta;
    }



    public function modificar(){
        $respuesta = false;
        $baseDatos = new BaseDatos();

        if (parent::modificar()) {  
            $consulta = "UPDATE teatro SET idFuncion = '" . parent::getIdFuncion() . "', escritor = '" . $this->getEscritor()  . "';";
            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    $respuesta = true;
                }else{
                    $this->setmensajeoperacion($baseDatos->getError());
                }
            }else{
                $this->setmensajeoperacion($baseDatos->getError());
            }
        }
        return $respuesta;
    }


    public function eliminar(){
        $baseDatos = new BaseDatos();
        $respuesta = false;
        if ($baseDatos->iniciar()) {
            $consulta = "DELETE FROM teatro WHERE idFuncion = " . parent::getIdFuncion();
            if ($baseDatos->ejecutar($consulta)) {
                if (parent::eliminar()) {
                    $respuesta = true;
                }
            }else{
                $this->setmensajeoperacion($baseDatos->getError());
            }
        }else{
            $this->setmensajeoperacion($baseDatos->getError());
        }
        return $respuesta;
    }



    public function darCosto(){
        $precioFuncion = parent::darCosto();
        $porcentaje = 0.45; 
        $resultado = $precioFuncion + ($precioFuncion * $porcentaje);
        return $resultado;
    }



    public function __toString(){
        return parent::__toString();
    }



 
}


?>