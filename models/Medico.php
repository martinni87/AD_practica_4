<?php
include_once("Persona.php");

class Medico extends Persona{

    //Método get all data from DB
    public function getAllData($connection){
        $sql = "SELECT * FROM medicos";
        $statement = $connection -> prepare($sql);
        $statement -> execute();

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