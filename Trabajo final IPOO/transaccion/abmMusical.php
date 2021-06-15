<?php 



class abmMusical{

    private $data; 

    public function __construct(){
        $this->data = []; 
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }


    function modificarFuncion($objFuncion,$datosFuncion){
        $objFuncion->cargar($datosFuncion);
        $objFuncion->modificar(); 
    }

    function seleccionFuncion($idFuncion){
        $objFuncion = new Musical(); 
        $objFuncion->buscar($idFuncion);
        return $objFuncion; 
    }

    function eliminarFuncion($objFuncion){
        $objFuncion->eliminar(); 
    }

    function agregarFuncion($datosFuncion){
        $nuevaFuncion = new Musical();
        $nuevaFuncion->cargar($datosFuncion);
        $nuevaFuncion->insertar(); 
        $array['precio'] = $datosFuncion['precio'] * 1.45; 
        $array['idFuncion'] = $datosFuncion['idFuncion']; 
        $data = $this->getData();
        array_push($data, $array); 
    }

    function listarFunciones($condicion){
        $nuevaFuncion = new Musical();
        $colFunciones = $nuevaFuncion->listar($condicion);
        
        foreach ($colFunciones as $funcion) {
            echo "-------------------------------";
            print_r($funcion); 
        }
    }

    function darCosto(){
        $arreglo = $this->getData(); 
        $total = 0; 
        for ($i=0; $i < count($arreglo) ; $i++) { 
            $total = $total + $arreglo[$i]['precio']; 
        }
        return $total; 
    }

}


?>