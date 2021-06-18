<?php 

include_once 'abmTeatro_obra.php';
include_once 'abmMusical.php';
include_once 'abmCine.php'; 

class abmTeatro{
    private $costo;

    public function __construct(){   
        $this->costo = 0; 
    }

    public function getCosto(){
        return $this->costo;
    }

    public function setCosto($costo){
        $this->costo = $costo;
    }

    function modificarTeatro($objTeatro,$nombre,$direccion){
        $objTeatro->setNombreTeatro($nombre);
        $objTeatro->setDireccion($direccion); 
        $objTeatro->modificar();
    }

    function seleccionTeatro($idTeatro){
        $objTeatro = new Teatro_Instalacion(); 
        $objTeatro->buscar($idTeatro);
        return $objTeatro; 
    }

    function eliminarTeatro($objTeatro){
      $funciones = $objTeatro->getFunciones();
      $retorno = false;
      $i = 0;
      while (!$retorno && $i < count($funciones)) {
         $retorno = $funciones[$i]->eliminar();  
         $i++;  
      }
      if($retorno || count($funciones) == 0){
         $retorno = $objTeatro->eliminar();
      }
      return $retorno;
    }

    function agregarTeatro($datosTeatro){
        $nuevoTeatro = new Teatro_Instalacion(); 
        $nuevoTeatro->cargar($datosTeatro); 
        $nuevoTeatro->insertar();
        
    }

    public function darCostos(){
        $teatro = new abmObra_Teatro();
        $cine = new abmCine();
        $musical = new abmMusical(); 

       $costoTeatro = $teatro->darCosto();
       $costoCine = $cine->darCosto();
       $costoMusical = $musical->darCosto(); 
       
       $total = $costoCine + $costoMusical + $costoTeatro; 
       return $total; 
    }

}


?>