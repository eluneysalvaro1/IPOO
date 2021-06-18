<?php 




class Musical extends Funcion{
    private $director;
    private $cantidadActores; 

    public function __construct(){
        parent::__construct();
        $this->director = "";
        $this->cantidadActores = "";
    }

    public function cargar($datosFuncion){
        parent::cargar($datosFuncion);
        $this->setDirector($datosFuncion['director']);
        $this->setCantidadActores($datosFuncion['cantidadActores']);
    }

    public function setmensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    public function getmensajeoperacion(){
		return $this->mensajeoperacion ;
	}


    public function setDirector($director){
        $this->director = $director;
    }

    public function getDirector(){
        return $this->director;
    }

    public function setCantidadActores($cA){
        $this->cantidadActores = $cA;
    }

    public function getCantidadActores(){
        return $this->cantidadActores;
    }

    public function buscar($idFuncion){
        $baseDatos = new BaseDatos(); 
        $consulta = "SELECT * FROM musical WHERE idFuncion = " . $idFuncion;
        $respuesta = false;
        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                if ($row2 = $baseDatos->registro()) {
                    parent::buscar($idFuncion);
                    $this->setDirector($row2['director']);
                    $this->setCantidadActores($row2['cantidadActores']); 
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
        $consulta = "SELECT * FROM musical ";
        if($condicion != ""){
            $consulta = $consulta . "WHERE " . $condicion; 
        } 
        $consulta .= " order by idFuncion"; 
        if($baseDatos->iniciar()){
            if ($baseDatos->ejecutar($consulta)) {
                $arregloFunciones = array();
                while ($row2 = $baseDatos->registro()) {
                    $obj = new Musical(); 
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
        $director = $this->getDirector();
        $cantidadActores = $this->getCantidadActores();
        if (parent::insertar()) {
            $consulta = "INSERT INTO musical(idFuncion,director,cantidadActores) 
            VALUES ('" . parent::getIdFuncion() . "','" . $director . "','" . $cantidadActores . "')";
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

        $director = $this->getDirector();
        $cantidadActores = $this->getCantidadActores();
       
        if (parent::modificar()) {  
            $consulta = "UPDATE musical SET director = '" . $director . "', cantidadActores = '" . $cantidadActores . "' 
            WHERE idFuncion = " . parent::getIdFuncion();

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
            $consulta = "DELETE FROM musical WHERE idFuncion = " . parent::getIdFuncion();
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
        $porcentaje = 0.12; 
        $resultado = $precioFuncion + ($precioFuncion * $porcentaje);
        return $resultado;
    }



    public function __toString(){
        return parent::__toString() .  
                "Director: " . $this->getDirector() . "\n" . 
                "Cantidad Actores: " . $this->getCantidadActores() . "\n";     
    }


}



?>