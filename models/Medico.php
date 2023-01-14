<?php
include_once("Persona.php");

class Medico extends Persona{

    //Método Get All Data from DB
    public function getAllData($connection){
        $sql = "SELECT * FROM medicos";
        $statement = $connection -> prepare($sql);
        $statement -> execute();

        while($data = $statement -> fetch(PDO::FETCH_ASSOC)){
            $id = $data["id"];

            $subarray["numero_colegiado"] = $data["numero_colegiado"];
            $subarray["dni"]              = $data["dni"];
            $subarray["nombre"]           = $data["nombre"];
            $subarray["apellido1"]        = $data["apellido1"];
            $subarray["apellido2"]        = $data["apellido2"];
            $subarray["telefono"]         = $data["telefono"];
            $subarray["especialidad"]     = $data["especialidad_id"];
            $subarray["horario"]          = $data["horario_id"];

            $arrayAssoc[$id] = $subarray;
        }

        $jsonBundle = json_encode($arrayAssoc);

        return $jsonBundle;
    }
}

?>