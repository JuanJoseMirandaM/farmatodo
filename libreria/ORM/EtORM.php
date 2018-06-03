<?php


namespace libreria\ORM;


class EtORM extends \Conexion{
    protected static $cnx;
    protected static $table;

    /**
     * EtORM constructor.
     */
    public function __construct()
    {
        self::getConexion(); //ejecutar cada ves que se invoca  a la funcion
    }

    public static function getConexion()
    {
        self::$cnx = \Conexion::conectar();
    }

    public static function getDesconectar(){
        self::$cnx = null;
    }

    public function Ejecutar($procedimiento,$params=null){
        $query = "call ".$procedimiento;

        self::getConexion();

        if(!is_null($params)){
            $paramsa = "";
            for($i = 0;$i < count($params); $i++){
                $paramsa .= ":".$i.",";
            }
            $paramsa = trim($paramsa,",");
            $paramsa .= ")";
            $query .= "(".$paramsa;
        }else{
            $query .= "()";
        }
        //echo "pepe ".$query;
        //agregando parametros al query
        $res = self::$cnx->prepare($query);
        if(!is_null($params)){
            for($i=0; $i < count($params); $i++){
                $res->bindParam(":".$i,$params[$i]);
            }
        }

        $res->execute();


        $obj = [];
        foreach ($res as $row){
            $obj[] = $row;
        }
        return $obj;
    }

    public function eliminar($valor = null,$columna = null){
        $query = "DELETE FROM ".static::$table . " WHERE ".(is_null($columna)?"id":$columna). " =:p";
        //echo $query;
        self::getConexion();
        //preparar conexion
        $res = self::$cnx->prepare($query);
        //agregamos los parametros
        if(!is_null($valor)){
            $res->bindParam(":p",$valor);
        }else{
            $newRes = (is_null($this->id)?null:$this->id);
            $res->bindParam(":p",$newRes);
            //$res->bindParam(":p",(is_null($this->id)?null:$this->id));
        }
        //ejecutar
        if($res->execute()){
            self::getDesconectar();
            return true;
        }else{
            return false;
        }
    }

    public function guardar(){
        $values = $this->getColumnas();

        $filtered = null; //una variable que va almacenar las columnas
        foreach ($values as $key => $value){
            //separa si es id sino lo agrega al array
            if($value !== null && !is_integer($key) && $value !=='' && strpos($key,'obj_') === false && $key !== 'id'){
                if($value === false){
                    $value = 0;
                }
                $filtered[$key] = $value;
                //echo $key." - ".$value."<br>";
            }
            //echo $key."<br>";
        }
        $columns = array_keys($filtered); //obteniendo las columnas
        // echo json_encode($columns);

        if($this->id){
            $params = "";
            foreach ($columns as $columna){
                $params .= $columna." = :".$columna.",";
            }
            $params = trim($params,",");
            $query = "UPDATE " . static::$table . " SET $params WHERE id =" . $this->id;
            //echo $query;
        }else{
            $params = join(", :",$columns);
            $params = ":".$params;
            $columns = join(", ", $columns);
            //echo static::$table . ;
            $query = "INSERT INTO ". static::$table . " ($columns) VALUES ($params)";
        }
        //echo $query;

        //preparamos la consulta
        self::getConexion();
        $res = self::$cnx->prepare($query);
        foreach ($filtered as $key => &$val) { //cargamos todos los valores de los parametros
            $res->bindParam(":". $key, $val);
        }
        //realizamos una respuesta
        if($res->execute()){
            $this->id = self::$cnx->lastInsertId();
            self::getDesconectar();
            return true;
        }else{
            return false;
        }
    }

    public static function where($columna,$valor){
        $query = "SELECT * FROM ". static ::$table ." WHERE ".$columna." = :".$columna;
        //echo $query;
        $class = get_called_class();
        self::getConexion();
        $res = self::$cnx->prepare($query);
        $res->bindParam(":".$columna,$valor);
        //$res->setFetchMode( PDO::FETCH_CLASS, $class);
        $res->execute();
        //$filas = $res->fetch();
        //echo count($filas);
        $obj = []; // ----
        foreach($res as $row){
            $obj[] = new $class($row);
        }
        self::getDesconectar();
        return $obj;
    }
    public static function find($id){
        //echo get_called_class();
        $resultado = self::where("id",$id);
        if(count($resultado)){
            return $resultado[0];
        }else{
            return [];
        }
    }

    public static function all(){
        $query = "SELECT * FROM ". static ::$table ;
        //echo $query;
        $class = get_called_class();
        self::getConexion();
        $res =  self::$cnx->prepare($query);
        //$res->setFetchMode(\PDO::FETCH_CLASS, $class);
        $res->execute();
        //$filas = $res->fetch();
        //echo count($filas);
        foreach ($res as $row) {
            $obj[] = new $class($row);
        }
        
        return $obj;
    }



}