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

switch (strtolower($_SERVER['REQUEST_METHOD'])) {
    case "get":
        echo $medico -> getAllData($connection);
        break;
    default:
        Methods::console_log("Nothing",true);
}
?>