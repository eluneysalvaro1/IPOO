<?php 

class Cine extends Funcion{

    private $genero;
    private $pais;

    public function __construct(){
        parent::__construct();
        $this->genero = "";
        $this->pais = "";
    }

    public function cargar($datosFuncion){
        parent::cargar($datosFuncion);
        $this->setPais($datosFuncion['pais']);
        $this->setGenero($datosFuncion['genero']);
    }


    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setmensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    public function getmensajeoperacion(){
		return $this->mensajeoperacion ;
	}

    public function setPais($pais){
        $this->pais = $pais;
    }

    public function getPais(){
        return $this->pais;
    }


    public function buscar($idFuncion){
        $baseDatos = new BaseDatos(); 
        $consulta = "SELECT * FROM cine WHERE idFuncion = " . $idFuncion;
        $respuesta = false;
        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                if ($row2 = $baseDatos->registro()) {
                    parent::buscar($idFuncion);
                    $this->setGenero($row2['genero']);
                    $this->setPais($row2['pais']); 
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
        $consulta = "SELECT * FROM cine ";
        if($condicion != ""){
            $consulta = $consulta . " WHERE " . $condicion; 
        } 
        $consulta .= " order by genero"; 
        if($baseDatos->iniciar()){
            if ($baseDatos->ejecutar($consulta)) {
                $arregloFunciones = array();
                while ($row2 = $baseDatos->registro()) {
                    $obj = new Cine(); 
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
        $genero = $this->getGenero();
        $pais = $this->getPais();
        if (parent::insertar()) {
            $consulta = "INSERT INTO cine(idFuncion,genero,pais) 
            VALUES ('" . parent::getIdFuncion() . "','" . $genero . "','" . $pais . "')";
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

        $genero = $this->getGenero();
        $pais = $this->getPais();

        if (parent::modificar()) {  
            $consulta = "UPDATE cine SET genero = '" . $genero . "', pais = '" . $pais . "' WHERE idFuncion = " . parent::getIdFuncion();
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
            $consulta = "DELETE FROM cine WHERE idFuncion = " . parent::getIdFuncion();
            
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
        $porcentaje = 0.65; 
        $resultado = $precioFuncion + ($precioFuncion * $porcentaje);
        return $resultado;
    }


    public function __toString(){
        return parent::__toString() .   
                "Genero: " . $this->getGenero() . "\n" . 
                "Pais: " . $this->getPais() . "\n";  
    }


}


?>