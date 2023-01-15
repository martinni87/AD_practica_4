<?php
include_once("config/Connection.php");
include_once("models/Medico.php");
include_once("config/Methods.php");

//Atributos para PDO
$mysqlHost = "localhost";
$dbHostName = "hospital";
$dbUserName = "root";
$dbPassword = "";

//Parametros Ajax si los hubiera
$nombre = $_GET["nombre"];
$apellido1 = $_GET["apellido1"];
$numero_colegiado = $_GET["numero_colegiado"];

//Ejecutamos conexión
$connection = Connection::tryConnection($mysqlHost, $dbHostName, $dbUserName, $dbPassword);

//Instanciamos médico
$medico = new Medico();

switch (strtolower($_SERVER['REQUEST_METHOD'])) {
    case "get":
        echo $medico -> getAllData($connection, $nombre, $apellido1, $numero_colegiado);
        break;
    case "posts":
        echo $medico -> setNewData($connection);
        break;
    case "put":
        echo $medico -> editData($connection);
        break;
    case "del":
        echo $medico -> deleteData($connection,$id);
        break;
    default:
        Methods::console_log("Error",true);
}
?>