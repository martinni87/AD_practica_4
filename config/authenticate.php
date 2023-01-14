<?php
interface authenticate {
    public static function tryConnection($mysqlHost, $dbHostName, $dbUserName, $dbPassword);
}

?>