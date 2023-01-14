<?php
include_once("authenticate.php");

class Connection implements authenticate{
    
    //Método para conexión
    public static function tryConnection($mysqlHost, $dbHostName, $dbUserName, $dbPassword){
        try {
            $dbhnString = "mysql:host=" . $mysqlHost .";dbname=" .$dbHostName;
            $connection = new PDO($dbhnString,$dbUserName,$dbPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            echo 'Error en la conexión a la BD: ' . $e -> getMessage();
        }

    }
}


?>