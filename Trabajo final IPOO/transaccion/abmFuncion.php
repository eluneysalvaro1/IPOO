<?php 


class abmFuncion{

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
        $objFuncion = new Funcion(); 
        $objFuncion->buscar($idFuncion);
        return $objFuncion; 
    }

    function eliminarFuncion($objFuncion){
        $objFuncion->eliminar(); 
    }

    function agregarFuncion($datosFuncion){
        $nuevaFuncion = new Funcion();
        $nuevaFuncion->cargar($datosFuncion);
        $nuevaFuncion->insertar(); 
    }

    function listarFunciones($condicion){
        $nuevaFuncion = new Funcion();
        $nuevaFuncion->listar($condicion);
        
        foreach ($nuevaFuncion as $funcion) {
            echo "-------------------------------";
            echo $funcion; 
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