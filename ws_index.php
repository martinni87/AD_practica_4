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

switch (strtolower($_SERVER['REQUEST_METHOD'])) {
    case "get":
        //Parametros Ajax si los hubiera
        $nombre             = $_GET["nombre"];
        $apellido1          = $_GET["apellido1"];
        $numero_colegiado   = $_GET["numero_colegiado"];

        //Instanciamos filtros de médico
        $filters = new Medico("","",$nombre,$apellido1,"","","","",$numero_colegiado,"","");

        echo $filters -> getData($connection, $filters);

        break;
    case "post":
        //Parametros Ajax
        $numero_colegiado   = $_POST["numero_colegiado"];
        $dni                = $_POST["dni"];
        $nombre             = $_POST["nombre"];
        $apellido1          = $_POST["apellido1"];
        $apellido2          = $_POST["apellido2"];
        $telefono           = $_POST["telefono"];
        $especialidad_id    = $_POST["especialidad_id"];
        $horario_id         = $_POST["horario_id"];

        //Instanciamos un objeto de médico con los datos introducidos
        $data = new Medico("",$dni,$nombre,$apellido1,$apellido2,$telefono,$sexo,$user_id,$numero_colegiado,$especialidad_id,$horario_id);

        echo $data -> setNewData($connection, $data);

        break;
    case "put":

        echo $medico -> editData($connection);

        break;
    case "del":

        echo $medico -> deleteData($connection,$id);

        break;
    case "reset":
        echo "Limpiar";
        break;
    default:
        Methods::console_log("Error",true);
}
?>