<?php

class Funcion{

    private $idFuncion;
    private $nombre;
    private $horaInicio;
    private $duracionObra;
    private $precio;
    private $objTeatro;
    private $mensajeoperacion;
    

    public function __construct(){
        $this->idFuncion = 0;
        $this->nombre = "";
        $this->horaInicio = "";
        $this->duracionObra = "";
        $this->precio = "";
        $this->objTeatro = "";
        $this->mensajeoperacion = "";
    }


    public function getIdFuncion(){
        return $this->idFuncion;
    }

    public function setIdFuncion($idFuncion){
        $this->idFuncion = $idFuncion;
    }

    public function setNombre($nombreNuevo){
        $this->nombre = $nombreNuevo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setHoraInicio($nuevaHora){
        $this->horaInicio = $nuevaHora;
    }

    public function getHoraInicio(){
        return $this->horaInicio;
    }

    public function setDuracionObra($nuevaHora){
        $this->duracionObra = $nuevaHora;
    }

    public function getDuracionObra(){
        return $this->duracionObra;
    }

    public function setPrecio($nuevoPrecio){
        $this->precio = $nuevoPrecio;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setmensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion = $mensajeoperacion;
	}
    
    public function getmensajeoperacion(){
        return $this->mensajeoperacion; 
    }

    public function getObjTeatro(){
        return $this->objTeatro;
    }

    public function setObjTeatro($objTeatro){
        $this->objTeatro = $objTeatro;
    }


    public function cargar($datosFuncion){	
	    $this->setIdFuncion($datosFuncion['idFuncion']);
		$this->setNombre($datosFuncion['nombre']);
		$this->setHoraInicio($datosFuncion['horaInicio']);
		$this->setDuracionObra($datosFuncion['duracion']);
		$this->setPrecio($datosFuncion['precio']);

        $objTeatro = new Teatro_Instalacion();
        $objTeatro->buscar($datosFuncion['idTeatro']);
        $this->setObjTeatro($objTeatro); 
    }


    public function darCosto(){
        $precioFuncion = $this->getPrecio();
        return $precioFuncion;
    }
    
    /**
     * POR AHORA YA ESTÁ
     * rescatamos todos los datos de la BASE DE DATOS
     */
    public function listar($condicion = ""){
	    $arregloFunciones = null;
		$baseDatos = new BaseDatos(); 
		$consultaFuncion = "SELECT * FROM funcion";
		if ($condicion != ""){
		    $consultaFuncion = $consultaFuncion . ' WHERE ' . $condicion;
		}
		$consultaFuncion .= " order by idFuncion";
		if($baseDatos->iniciar()){
			if($baseDatos->ejecutar($consultaFuncion)){				
				$arregloFunciones = array();
				while($row2 = $baseDatos->registro()){
                    //llamar al buscar de funcion
                    // $objTeatro = new Teatro_Instalacion();
                    // $objTeatro->buscar($row2['idTeatro']);
                    // $row2['objTeatro'] = $objTeatro; 
                    
					$funcion = new Funcion();
					$funcion->buscar($row2['idFuncion']);
                    array_push($arregloFunciones,$funcion);
				}
		 	}	else {
                $this->setmensajeoperacion($baseDatos->getError());
			}
		 }	else {
            $this->setmensajeoperacion($baseDatos->getError());
		 }	
		 return $arregloFunciones;
	}	



    /**
	 * Recupera los datos de una funcion por ID
	 * @param int id
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function buscar($id){
		$baseDatos = new BaseDatos(); 
		$consultaPersona = "SELECT * FROM funcion  WHERE idFuncion = " . $id;
		$resp= false;
		if($baseDatos->iniciar()){
			if($baseDatos->ejecutar($consultaPersona)){
				if($row2 = $baseDatos->registro()){
                    $objTeatro = new Teatro_Instalacion();
                    $objTeatro->buscar($row2['idTeatro']);

				    $this->setIdFuncion($id);
				    $this->setNombre($row2['nombre']);
					$this->setHoraInicio($row2['horaInicio']);
					$this->setDuracionObra($row2['duracion']);
					$this->setPrecio($row2['precio']);
                    $this->setObjTeatro($objTeatro); 
					$resp = true;
				}				
		 	}	else {
		 			$this->setmensajeoperacion($baseDatos->getError());
			}
		 }	else {
		 		$this->setmensajeoperacion($baseDatos->getError());
		 }		
		 return $resp;
	}


    
    /**
     * Inserta datos a la base de datos siempre y cuando ese id no exista
     * 
     * 
     */
    public function insertar(){
        $baseDatos = new BaseDatos(); 
        $respuesta = false;

        $nombre = $this->getNombre();
        $horaInicio = $this->getHoraInicio();
        $duracion = $this->getDuracionObra();
        $precio = $this->getPrecio();
        $idTeatro = $this->getObjTeatro()->getIdTeatro();

        $consulta = "INSERT INTO funcion (nombre,horaInicio,duracion,precio,idTeatro) 
        VALUES ('". $nombre . "','" . $horaInicio . "','" . $duracion . "','" . $precio . "','" . $idTeatro . "' );";

            if ($baseDatos->iniciar()) {
                if ($idFuncion = $baseDatos->devuelveIDInsercion($consulta)) {
                    $this->setIdFuncion($idFuncion);
                    $respuesta = true;
                }else{
                    $this->setmensajeoperacion($baseDatos->getError());
                }
            }else{
                $this->setmensajeoperacion($baseDatos->getError());
            }
        
        return $respuesta;  
    }




    /**
     * Modificamos un valor de la base de datos
     * 
     */
    public function modificar(){
	    $resp = false; 
        $baseDatos = new BaseDatos(); 

        $idFuncion = $this->getIdFuncion();
        $nombre = $this->getNombre();
        $horaInicio = $this->getHoraInicio();
        $duracion = $this->getDuracionObra();
        $precio = $this->getPrecio();
        $idTeatro = $this->getObjTeatro()->getIdTeatro();


		$consultaModifica = "UPDATE funcion SET nombre = '". $nombre . "',horaInicio = '". $horaInicio . "',duracion = '". $duracion . "',precio = '" . $precio . "',idTeatro = '" . $idTeatro . "' WHERE idFuncion =" . $idFuncion;
		
        if($baseDatos->iniciar()){
            
			if($baseDatos->ejecutar($consultaModifica)){
                $resp=  true;
			}else{
				$this->setmensajeoperacion($baseDatos->getError());
			}
		}else{
				$this->setmensajeoperacion($baseDatos->getError());
		}
		return $resp;
	}
	


	public function eliminar(){
		$baseDatos = new BaseDatos(); 
		$resp = false;
        $idFuncion = $this->getIdFuncion();
		if($baseDatos->iniciar()){
				$consultaBorra="DELETE FROM funcion WHERE idFuncion = ".$idFuncion;
				if($baseDatos->ejecutar($consultaBorra)){
				    $resp=  true;
				}else{
						$this->setmensajeoperacion($baseDatos->getError());
				}
		}else{
				$this->setmensajeoperacion($baseDatos->getError());
		}
		return $resp; 
	}




    public function __toString(){
        $nombre = $this->getNombre();
        $horaInicio = $this->getHoraInicio();
        $duracionObra = $this->getDuracionObra();
        $precio = $this->getPrecio();
        $id = $this->getIdFuncion(); 
        return "Nombre: " . $nombre . "\n" . 
                "Hora de Inicio: " . $horaInicio . "\n" . 
                "Duracion obra: " . $duracionObra . "\n" . 
                "Precio: " . $precio . "\n" . 
                "Id: " . $id . "\n"; 
    }








   


    
}


$funcion = new Funcion("Romeo y Julieta" , 15,30 , 30 , 350 , 1);



?>