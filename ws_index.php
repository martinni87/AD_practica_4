<?php
include_once("config/Connection.php");
include_once("models/Medico.php");
include_once("config/Methods.php");

//Atributos para PDO
$mysqlHost = "localhost";
$dbHostName = "hospital";
$dbUserName = "root";
$dbPassword = "";

$connection = Connection::tryConnection($mysqlHost, $dbHostName, $dbUserName, $dbPassword);

$medico = new Medico();

$id = $_POST["user_id"];

switch (strtolower($_SERVER['REQUEST_METHOD'])) {
    case "get":
        echo $medico -> getAllData($connection);
        break;
    case "post":
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