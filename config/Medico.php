<?php


class Medico extends Persona{

    //Constructor
    public function __construct(){
        echo "Constructor executed";
    }

    //Método Get All Data from DB
    public function getAllData($connection){
        $sql = "SELECT * FROM medicos";
        $statement = $connection -> prepare($sql);
        $statement -> execute();

        return $statement -> fetchAll();
    }
}



?>