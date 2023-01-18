<?php
include_once("config/Connection.php");
include_once("models/Medico.php");
include_once("config/Methods.php");

//Atributos para PDO
$mysqlHost  = "localhost";
$dbHostName = "hospital";
$dbUserName = "root";
$dbPassword = "";

//Ejecutamos conexión
$connection = Connection::tryConnection($mysqlHost, $dbHostName, $dbUserName, $dbPassword);

// switch (strtolower($_SERVER['REQUEST_METHOD'])) {
switch (strtolower($_GET["action"])){
    case "read":
        //Parametros Ajax si los hubiera
        $nombre             = $_GET["nombre"];
        $apellido1          = $_GET["apellido1"];
        $numero_colegiado   = $_GET["numero_colegiado"];

        //Instanciamos filtros de médico
        $filters = new Medico("","",$nombre,$apellido1,"","",/*"",*/"",$numero_colegiado,"","");

        echo $filters -> getData($connection, $filters);

        break;
    case "create":
        //Parametros Ajax introducidos
        $numero_colegiado   = $_GET["numero_colegiado"];
        $dni                = $_GET["dni"];
        $nombre             = $_GET["nombre"];
        $apellido1          = $_GET["apellido1"];
        $apellido2          = $_GET["apellido2"];
        $telefono           = $_GET["telefono"];
        $especialidad_id    = $_GET["especialidad_id"];
        $horario_id         = $_GET["horario_id"];

        $array = array();
        $array["nombre"] = $numero_colegiado;
        //Instanciamos un objeto de médico con los datos introducidos
        // $data = new Medico("",$dni,$nombre,$apellido1,$apellido2,$telefono,/*$sexo,*/"",$numero_colegiado,$especialidad_id,$horario_id);

        // echo $data -> setNewData($connection, $data);

        echo json_encode($array);


        break;
    case "update":

        echo $medico -> editData($connection);

        break;
    case "delete":

        echo $medico -> deleteData($connection,$id);

        break;
    case "reset":
        echo "Limpiar";
        break;
    default:
        Methods::console_log("Error",true);
}
?>