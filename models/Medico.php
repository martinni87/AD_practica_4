<?php
include_once("Persona.php");

class Medico extends Persona{
    private $numero_colegiado;
    private $especialidad;
    private $horario;
    private $dataArray;

    //Constructor
    public function __construct($id = "", $dni = "", $nombre = "", $apellido1 = "", $apellido2 = "", $telefono = "", /*$sexo = "",*/ $user_id = "",
                                $numero_colegiado = "", $especialidad = "", $horario = ""){
        parent::__construct($id, $dni, $nombre, $apellido1, $apellido2, $telefono, /*$sexo,*/ $user_id);
        $this -> numero_colegiado = $numero_colegiado;
        $this -> especialidad = $especialidad;
        $this -> horario = $horario;
        $this -> dataArray = array();
    }

    //Getters
    public function getNumero_colegiado(){
        return $this -> numero_colegiado;
    }
    public function getEspecialidad(){
        return $this -> especialidad;
    }
    public function getHorario(){
        return $this -> horario;
    }

    //Setters
    public function setNumero_colegiado($numero_colegiado){
        $this -> numero_colegiado = $numero_colegiado;
    }
    public function setEspecialidad($especialidad){
        $this -> especialidad = $especialidad;
    }
    public function setHorario($horario){
        $this -> horario = $horario;
    }


    //Método para establecer filtrado de parámetros
    private static function setParameters(Medico $medico){
        //Cargamos los atributos del objeto pasado como parámetro
        $dni = $medico -> getDni();
        $nombre = $medico -> getNombre();
        $apellido1 = $medico -> getApellido1();
        $apellido2 = $medico -> getApellido2();
        $numero_colegiado = $medico -> getNumero_colegiado();
        $telefono = $medico -> getTelefono();
        $especialidad_id = $medico -> getEspecialidad();
        $horario_id = $medico -> getHorario();

        //Para el método GET creamos una variable que recibirá la parte de filtros a aplicar en la query
        $sql_filters = "";

        //Array que recoge parámetros sólo si el usuario ha utilizado un determinado filtro durante el método GET
        $parameters = array();

        //Creamos dos array que recibirán los datos que el usuario introduzca en las celdas.
        $sql_columns = array();
        $sql_values = array();

        //Condiciones de filtros. Se añaden si el usuario indica un valor en un filtro y son acumulativos. Definen $sql y $parametros
        //Cuando el método se use para filtrar listados de usuarios, solo se usarán sql_filters y parameters.
        //Solo cuando el método se use para registro de nuevos usuarios se utilizan los datos de sql_columns y sql_values.
        if ($dni != ""){
            $sql_filters .= ' AND dni LIKE :dni';
            $sql_columns[] = 'dni';
            $sql_values[] = ':dni';
            $parameters[':dni'] = '%'.$dni.'%';
        }
        if ($nombre != ""){
            $sql_filters .= ' AND nombre LIKE :nombre';
            $sql_columns[] = 'nombre';
            $sql_values[] = ':nombre';
            $parameters[':nombre'] = '%'.$nombre.'%';
        }
        if ($apellido1 != ""){
            $sql_filters .= ' AND apellido1 LIKE :apellido1';
            $sql_columns[] = 'apellido1';
            $sql_values[] = ':apellido1';
            $parameters[':apellido1'] = '%'.$apellido1.'%';
        }
        if ($apellido2 != ""){
            $sql_filters .= ' AND apellido2 LIKE :apellido2';
            $sql_columns[] = 'apellido2';
            $sql_values[] = ':apellido2';
            $parameters[':apellido2'] = '%'.$apellido2.'%';
        }
        if ($numero_colegiado != ""){
            $sql_filters .= ' AND numero_colegiado LIKE :numero_colegiado';
            $sql_columns[] = 'numero_colegiado';
            $sql_values[] = ':numero_colegiado';
            $parameters[':numero_colegiado'] = '%'.$numero_colegiado.'%';
        }
        if ($telefono != ""){
            $sql_filters .= ' AND telefono LIKE :telefono';
            $sql_columns[] = 'telefono';
            $sql_values[] = ':telefono';
            $parameters[':telefono'] = '%'.$telefono.'%';
        }
        if ($especialidad_id != ""){
            $sql_filters .= ' AND especialidad_id LIKE :especialidad_id';
            $sql_columns[] = 'especialidad_id';
            $sql_values[] = ':especialidad_id';
            $parameters[':especialidad_id'] = '%'.$especialidad_id.'%';
        }
        if ($horario_id != ""){
            $sql_filters .= ' AND horario_id LIKE :horario_id';
            $sql_columns[] = 'horario_id';
            $sql_values[] = ':horario_id';
            $parameters[':horario_id'] = '%'.$horario_id.'%';
        }

        $arrayParameters = array();
        $arrayParameters["filters"] = $sql_filters;
        $arrayParamemters["values"] = $sql_values;
        $arrayParameters["columns"] = $sql_columns;
        $arrayParameters["parameters"] = $parameters;

        return $arrayParameters;
    }

    private function createArrayAssoc(){
        $this -> dataArray[$this -> getId()]["dni"]               = $this -> getDni();
        $this -> dataArray[$this -> getId()]["nombre"]            = $this -> getNombre();
        $this -> dataArray[$this -> getId()]["apellido1"]         = $this -> getApellido1();
        $this -> dataArray[$this -> getId()]["apellido2"]         = $this -> getApellido2();
        $this -> dataArray[$this -> getId()]["telefono"]          = $this -> getTelefono();
        // $this -> dataArray[$this -> getId()]["sexo"]              = $this -> getSexo();
        $this -> dataArray[$this -> getId()]["user_id"]           = $this -> getUser_id();
        $this -> dataArray[$this -> getId()]["numero_colegiado"]  = $this -> getNumero_colegiado();
        $this -> dataArray[$this -> getId()]["especialidad_id"]   = $this -> getEspecialidad();
        $this -> dataArray[$this -> getId()]["horario_id"]        = $this -> getHorario();

        return $this -> dataArray;
    }

    //Método get all data from DB
    public function getData($connection, Medico $filters){
        
        $sql_inputData = $this -> setParameters($filters);
        $sql_filters = $sql_inputData["filters"];
        $parameters = $sql_inputData["parameters"];

        $sql = 'SELECT * FROM medicos WHERE true' . $sql_filters;

        $statement = $connection -> prepare($sql);
        $statement -> execute($parameters);

        $arrayAssoc = array();

        while($data = $statement -> fetch(PDO::FETCH_ASSOC)){
            $this -> setId($data["id"]);
            $this -> setDni($data["dni"]);
            $this -> setNombre($data["nombre"]);
            $this -> setApellido1($data["apellido1"]);
            $this -> setApellido2($data["apellido2"]);
            $this -> settelefono($data["telefono"]);
            // $this -> setSexo($data["sexo"]);
            $this -> setUser_id($data["user_id"]);
            $this -> setNumero_colegiado($data["numero_colegiado"]);
            $this -> setEspecialidad($data["especialidad_id"]);
            $this -> setHorario($data["horario_id"]);

            $arrayAssoc = $this -> createArrayAssoc();
        }

        return json_encode($arrayAssoc);
    }

    //Método post para crear registros nuevos en la DB
    public function setNewData($connection, Medico $data){
        //Creamos dos array que recibirán los datos que el usuario introduzca en las celdas.
        //Creamos un array que parametrizará los datos introducidos para añadirlos a la query
        // $sql_columns = array();
        $sql_values = array();
        $parameters = array();

        // //Añadimos los datos que identifican las columnas y sus respectivos valores en el formulario de registro
        $sql_inputData = $this -> setParameters($data);
        // $sql_columns = $sql_inputData["columns"];
        $sql_values = $sql_inputData["values"];
        $parameters = $sql_inputData["parameters"];
        // $parameters[":dni"]                 = $data["dni"];
        // $parameters[":numero_colegiado"]    = $data["numero_colegiado"];
        // $parameters[":nombre"]              = $data["nombre"];
        // $parameters[":apellido1"]           = $data["apellido1"];
        // $parameters[":apellido2"]           = $data["apellido2"];
        // $parameters[":telefono"]            = $data["telefono"];
        // $parameters[":especialidad_id"]     = $data["especialidad_id"];
        // $parameters[":horario_id"]          = $data["horario_id"];

        $sql = "INSERT INTO medicos
                            (dni,numero_colegiado,nombre,apellido1,
                            apellido2,especialidad_id,horario_id)
                    VALUES  (";
        $separator = ",";

        // //Concatenamos para construir la query completa
        // $sql .= implode($separator,$sql_columns);
        // $sql .= ') VALUES (';
        $sql .= implode($separator, $sql_values);
        $sql .= ')';

        $statement = $connection -> prepare($sql);
        $statement -> execute($parameters);

        return json_encode($sql);
    }

    //Método put para editar registros existentes en la DB
    public function editData($connection){
        echo "Editar registro existente";
    }

    //Método delete data from DB
    public function deleteData($connection, $id){
        //Parámetro
        $parameters = array();
        $parameters[":user_id"] = $id;

        //Query
        $sql = 'DELETE FROM medico WHERE user_id=:user_id';

        //Statement prepare & execute.
        $stmt = $connection -> prepare($sql);
        $stmt->execute($parameters);
    }
}

?>