<?php 

class BaseDatos{

    private $hostName;
    private $baseDatos;
    private $usuario;
    private $clave;
    private $conexion;
    private $query;
    private $result;
    private $error;

    /*
    * Construccion de la base de datos
    *
    */
    public function __construct(){
        $this->hostName = "127.0.0.1";
        $this->baseDatos = "bdteatro";
        $this->usuario = "root";
        $this->clave = "eluneysalvaro1";
        $this->result = 0;
        $this->query = "";
        $this->error = "";
    }


    public function getHostName(){
        return $this->hostName;
    }

    public function setHostName($hostName){
        $this->hostName = $hostName;
    }
 
    public function getBaseDatos(){
        return $this->baseDatos;
    }

    public function setBaseDatos($baseDatos){
        $this->baseDatos = $baseDatos;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getClave(){
        return $this->clave;
    }

    public function setClave($clave){
        $this->clave = $clave;
    }

    public function getConexion(){
        return $this->conexion;
    }

    public function setConexion($conexion){
        $this->conexion = $conexion;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery($query){
        $this->query = $query;
    }

    public function getResult(){
        return $this->result;
    }

    public function setResult($result){
        $this->result = $result;
    }

    public function setError($error){
        $this->error = $error;
    }

    public function getError(){
        return $this->error;
    }



    /**
     * Inicia la coneccion con el Servidor y la  Base Datos Mysql.
     * Retorna true si la coneccion con el servidor se pudo establecer y false en caso contrario
     *
     * @return boolean
     */
    public function iniciar(){
        $resp  = false;
        $host = $this->getHostName(); 
        $usuario = $this->getUsuario(); 
        $clave = $this->getClave();
        $baseDatos = $this->getBaseDatos();

        $query = $this->getQuery();
        $error = $this->getError();

        $conexion = mysqli_connect($host,$usuario,$clave,$baseDatos);
        if ($conexion){
            if (mysqli_select_db($conexion,$baseDatos)){
                $this->setConexion($conexion);
                unset($query);
                unset($error);
                $resp = true;
            }  else {
                $error = mysqli_errno($conexion) . ": " . mysqli_error($conexion);
            }
        }else{
            $error =  mysqli_errno($conexion) . ": " .mysqli_error($conexion);
        }
        return $resp;
    }
 

/**
     * Devuelve el id de un campo autoincrement utilizado como clave de una tabla
     * Retorna el id numerico del registro insertado, devuelve null en caso que la ejecucion de la consulta falle
     *
     * @param string $consulta
     * @return int id de la tupla insertada
     */
    public function devuelveIDInsercion($consulta){
        $resp = null;
        $error = $this->getError();
        unset($error);
        
        $result = $this->getResult();
        $conexion = $this->getConexion();
        if ($result = mysqli_query($conexion,$consulta)){
            $id = mysqli_insert_id($this->getConexion());
            $resp =  $id;
        } else {
            $error = mysqli_errno( $this->getConexion()) . ": " . mysqli_error( $this->getConexion());
            echo $error;
        }
    return $resp;
    }




    /**
     * Devuelve un registro retornado por la ejecucion de una consulta
     * el puntero se despleza al siguiente registro de la consulta
     *
     * @return boolean
     */
    public function registro() {
        $resp = null;
        $error = $this->getError();
       

        if ($this->result){
          
            unset($error);
            if($temp = mysqli_fetch_assoc($this->result)){
                
                $resp = $temp;
            }else{
                mysqli_free_result($this->result);
            }
        }else{
            $error = mysqli_errno($this->getConexion()) . ": " . mysqli_error($this->getConexion());
        }
        return $resp ;
    }


    /**
     * Ejecuta una consulta en la Base de Datos.
     * Recibe la consulta en una cadena enviada por parametro.
     *
     * @param string $consulta
     * @return boolean
     */
    public function ejecutar($consulta){
        $resp  = false;
        $error = $this->getError();
        unset($error);
        $this->query = $consulta;
        if($this->result = mysqli_query( $this->conexion,$consulta)){
            $resp = true;
        } else {
            echo mysqli_errno( $this->getConexion()).": ". mysqli_error( $this->getConexion());
        }
        return $resp;
        
    }




}

?>