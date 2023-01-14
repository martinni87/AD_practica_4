<?php
echo "start<br>";
include_once("config/Connection.php");
include_once("config/Medico.php");
echo "Include done<br>";

//Atributos para PDO
$mysqlHost = "localhost";
$dbHostName = "hospital";
$dbUserName = "root";
$dbPassword = "";

echo "Atributes done<br>";

$connection = Connection::tryConnection($mysqlHost, $dbHostName, $dbUserName, $dbPassword);

echo "Connection done <br>";

$medico = new Medico();

echo "medico created <br>";

$medico -> getAllData($connection);

echo "End";
?>