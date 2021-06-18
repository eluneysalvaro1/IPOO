<?php

include_once 'bdTeatro.php';


 class Teatro_Instalacion{
    private $idTeatro;
    private $nombreTeatro;
    private $direccion;
    private $funciones;
    private $mensajeoperacion;


    public function __construct(){
        $this->nombre = "";
        $this->idTeatro = "";
        $this->funciones = [];
        $this->direccion = "";
        $this->mensajeoperacion = "";
    }
    
    public function setNombreTeatro($nuevoNombre){
        $this->nombreTeatro = $nuevoNombre;
    }

    public function getNombreTeatro(){
        return $this->nombreTeatro;
    }
    
    public function getFunciones(){
                $objCine = new Cine();
                $objMusical = new Musical();
                $objTeatro = new Obra_Teatro();
                    
                $coleccionCine = $objCine->listar(); 
                $coleccionMusical = $objMusical->listar();
                $coleccionTeatro = $objTeatro->listar();

                $funciones = array_merge($coleccionCine,$coleccionMusical,$coleccionTeatro);
                $this->setFunciones($funciones);
    
        return $this->funciones;
    }

    public function setFunciones($funciones){
        $this->funciones = $funciones;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
   

    public function getIdTeatro(){
        return $this->idTeatro;
    }

   public function setIdTeatro($idTeatro){
        $this->idTeatro = $idTeatro;
   }

   public function setmensajeoperacion($mensajeoperacion){
       $this->mensajeoperacion = $mensajeoperacion;
   }
   
   public function getmensajeoperacion(){
       return $this->mensajeoperacion; 
   }





public function cargar($datosTeatro){
    $this->setIdTeatro($datosTeatro['idTeatro']);
    $this->setNombreTeatro($datosTeatro['nombreTeatro']);
    $this->setDireccion($datosTeatro['direccion']);
}

/**
 * 
 * REGRESA TRUE SI SE SOLAPAN LAS FUNCIONES
 */
public function solapamiento($horaInicioNuevo , $duracionFuncionNuevo){
    $funciones = $this->getFunciones(); 
    $solapado = false;
    $horaNueva = ($horaInicioNuevo[0] * 60) + $horaInicioNuevo[1]; 
    $horaCierreNueva = $horaNueva + $duracionFuncionNuevo; 
    
    foreach ($funciones as $funcion) {
        $horaFuncion = intval((substr($funcion->getHoraInicio(), 0 , 2) * 60) + substr($funcion->getHoraInicio(), 2 , -1) * 100 );
        $horaFinal = $horaFuncion + $funcion->getDuracionObra(); 
        if (($horaNueva >= $horaFuncion) && ($horaNueva <= $horaFinal)) {
            $solapado = true; 
        }   
    }
    foreach ($funciones as $funcion) {
        $horaFuncion = intval((substr($funcion->getHoraInicio(), 0 , 2) * 60) + substr($funcion->getHoraInicio(), 2 , -1));
        $horaFinal = $horaFuncion + $funcion->getDuracionObra(); 
        if ($horaNueva <= $horaFuncion && $horaFinal <= $horaCierreNueva ) {
            $solapado = true; 
        }
    }

    foreach ($funciones as $funcion) {
        $horaFuncion = intval((substr($funcion->getHoraInicio(), 0 , 2) * 60) + substr($funcion->getHoraInicio(), 2 , -1));
        $horaFinal = $horaFuncion + $funcion->getDuracionObra(); 
        if ($horaNueva <= $horaFuncion && $horaFinal <= $horaCierreNueva) {
            $solapado = true; 
        }
    }

    return $solapado; 
}




    /**
	 * Recupera los datos de un teatro por ID
	 * @param int id
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function buscar($id){
		$baseDatos = new BaseDatos(); 
		$consultaPersona = "SELECT * FROM teatroinstalacion  WHERE idTeatro = " . $id;
		$resp = false;

		if($baseDatos->iniciar()){
            
			if($baseDatos->ejecutar($consultaPersona)){
                
				if($row2 = $baseDatos->registro()){
                    $this->setIdTeatro($id);
				    $this->setNombreTeatro($row2['nombreTeatro']);
					$this->setDireccion($row2['direccion']);
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
     * POR AHORA YA ESTÁ
     * rescatamos todos los datos de la BASE DE DATOS
     */
    public function listar($condicion = ""){
	    $arregloFunciones = null;
		$baseDatos = new BaseDatos(); 
		$consultaFuncion = "SELECT * FROM teatroinstalacion";
		if ($condicion != ""){
		    $consultaFuncion = $consultaFuncion . ' WHERE ' . $condicion;
		}
		$consultaFuncion.=" ORDER BY idFuncion";
		if($baseDatos->iniciar()){
			if($baseDatos->ejecutar($consultaFuncion)){				
				$arregloFunciones = array();
				while($row2 = $baseDatos->registro()){
                    
                    $objTeatro = new Teatro_Instalacion();
                    $objTeatro->buscar($row2['idTeatro']);
					$funcion = new Funcion();
                    $row2['objTeatro'] = $objTeatro; 
					$funcion->cargar($row2);
					
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
     * Modificamos un valor de la base de datos
     * 
     */
    public function modificar(){
	    $resp = false; 
        $baseDatos = new BaseDatos(); 

        $idTeatro = $this->getIdTeatro();
        $nombre = $this->getNombreTeatro();
        $direccion = $this->getDireccion();
        
		$consultaModifica = "UPDATE teatroinstalacion SET nombreTeatro = '". $nombre . "'
                           ,direccion='". $direccion . "' WHERE idTeatro =" . $idTeatro;
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
        $idTeatro = $this->getIdTeatro();
		if($baseDatos->iniciar()){
				$consultaBorra="DELETE FROM teatroinstalacion WHERE idTeatro = ".$idTeatro;
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


    public function insertar(){
        $baseDatos = new BaseDatos(); 

        $respuesta = false;

        $nombre = $this->getNombreTeatro();
        $idTeatro = $this->getIdTeatro();
        $direccion = $this->getDireccion();

        $consulta = "INSERT INTO teatroinstalacion (idTeatro, nombreTeatro, direccion) 
        VALUES ('" . $idTeatro . "','" . $nombre . "','" . $direccion . "' )";

            if ($baseDatos->iniciar()) {

                if ($idTeatro = $baseDatos->devuelveIDInsercion($consulta)) {

                    $this->setIdTeatro($idTeatro);
                    $respuesta = true;
                }else{
                    $this->setmensajeoperacion($baseDatos->getError());
                }
            }else{
                $this->setmensajeoperacion($baseDatos->getError());
            }
        return $respuesta;
    }


    public function darCostos(){
        $this->buscar(1);  
        $funciones = $this->getFunciones();
        $precioTotal = 0;
        foreach ($funciones as $funcion) {
            $precioTotal = $precioTotal + $funcion->darCosto();
        }
        return $precioTotal;
    }




    public function __toString(){
        $nombreTeatro = $this->getNombreTeatro();
        $direccionTeatro = $this->getDireccion();
        $funciones = $this->getFunciones();
        return $nombreTeatro .  "\n" . $direccionTeatro . "\n" . print_r($funciones) . "\n";
    }

 }


?>