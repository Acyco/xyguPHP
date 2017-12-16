<?php

/**
 * File: 02.php
 * User: Joye Chen
 * Date: 2017-12-16
 * Time: 10:44
 */
interface db
{
    function conn();
}

class dbmysql implements db
{
    public function conn()
    {
        echo "mysql";
    }
}

class dbsqlite implements db
{
    
    function conn()
    {
        echo "sqlite";
    }
}

class Factory
{
    public static function createDB($type)
    {
        if ($type == "mysql") {
            return new dbmysql();
        } else if ($type == "sqlite") {
            return new dbsqlite();
        } else{
            throw new Exception("Error db type ", 1);
        }
    }
}

$mysql = Factory::createDB("mysql");
$mysql->conn();
$sqlite = Factory::createDB("sqlite");
$mysql->conn();


