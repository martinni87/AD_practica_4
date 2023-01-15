<?php
include_once("Persona.php");

class Medico extends Persona{

    //Método get all data from DB
    public function getAllData($connection, $nombre, $apellido1, $numero_colegiado){
        //Creamos una variable que recibirá la parte de filtros a aplicar en la query
        $sql_filtros = "";

        //Array que recoge parámetros sólo si el usuario ha utilizado un determinado filtro.
        $parameters = array();

        //Condiciones de filtros. Se añaden si el usuario indica un valor en un filtro y son acumulativos. Definen $sql y $parametros
        if ($nombre != ""){
            $sql_filtros .= ' AND nombre LIKE :nombre';
            $parameters[':nombre'] = '%'.$nombre.'%';
        }
        if ($apellido1 != ""){
            $sql_filtros .= ' AND apellido1 LIKE :apellido1';
            $parameters[':apellido1'] = '%'.$apellido1.'%';
        }
        if ($numero_colegiado != ""){
            $sql_filtros .= ' AND numero_colegiado LIKE :numero_colegiado';
            $parameters[':numero_colegiado'] = '%'.$numero_colegiado.'%';
        }

        $sql = 'SELECT * FROM medicos WHERE true' . $sql_filtros;

        $statement = $connection -> prepare($sql);
        $statement -> execute($parameters);

        $arrayAssoc = array();
        $subarray = array();

        while($data = $statement -> fetch(PDO::FETCH_ASSOC)){
            $id = $data["id"];

            $subarray["numero_colegiado"]   = $data["numero_colegiado"];
            $subarray["dni"]                = $data["dni"];
            $subarray["nombre"]             = $data["nombre"];
            $subarray["apellido1"]          = $data["apellido1"];
            $subarray["apellido2"]          = $data["apellido2"];
            $subarray["telefono"]           = $data["telefono"];
            $subarray["especialidad"]       = $data["especialidad_id"];
            $subarray["horario"]            = $data["horario_id"];
            $subarray["user_id"]            = $data["user_id"];

            $arrayAssoc[$id] = $subarray;
        }

        $jsonBundle = json_encode($arrayAssoc);

        return $jsonBundle;
    }

    //Método post para crear registros nuevos en la DB
    public function setNewData($connection){
        echo "Crear nuevo registro";
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