<?php 

class Libro{
    private $isbn;
    private $titulo;
    private $añoEdicion;
    private $editorial;
    private $nombreAutor;
    private $apellidoAutor;

    public function __construct($isbn,$titulo,$añoEdicion,$editorial,$nombreAutor,$apellidoAutor){
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->añoEdicion = $añoEdicion;
        $this->editorial = $editorial;
        $this->nombreAutor = $nombreAutor;
        $this->apellidoAutor = $apellidoAutor;
    }

    public function setIsbn($variable){
        $this->isbn = $variable;
    }
    public function getIsbn(){
        return $this->isbn;
    }

    public function setTitulo($variable){
        $this->titulo = $variable;
    }
    public function getTitulo(){
        return $this->titulo;
    }

    public function setAñoEdicion($variable){
        $this->añoEdicion = $variable;
    }
    public function getAñoEdicion(){
        return $this->añoEdicion;
    }

    public function setEditorial($variable){
        $this->editorial = $variable;
    }
    public function getEditorial(){
        return $this->editorial;
    }

    public function setNombreAutor($variable){
        $this->nombreAutor = $variable;
    }
    public function getNombreAutor(){
        return $this->nombreAutor;
    }

     public function setApellidoAutor($variable){
        $this->apellidoAutor = $variable;
    }
    public function getApellidoAutor(){
        return $this->apellidoAutor;
    }

    public function perteneceEditorial($peditorial){
        if ($this->editorial == $peditorial) {
            $rta = true;
        }else{
            $rta = false;
        }
        return $rta;
    }

    public function iguales($plibro , $parreglo){
        $i = 0;
        $bandera = true;
        do {
            if ($parreglo[$i] == $plibro ) {
                echo "Si pertenece: \n";
                $bandera = false;
            }else{
                $i++;
            }
        } while (!$bandera);
    }

    public function aniosDesdeEdicion(){
        return $this->añoEdicion - 2021;
    }

    public function librosDeEditoriales($arregloAutor,$pEditorial){

    }


    public function __toString(){
        return $this->isbn . "\n" .
        $this->titulo  . "\n" .
        $this->añoEdicion . "\n" .
        $this->editorial  . "\n" .
        $this->nombreAutor . "\n" .
        $this->apellidoAutor;
    }
}


?>