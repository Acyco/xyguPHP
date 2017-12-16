<?php

/**
 * File: 04.php
 * User: Joye Chen
 * Date: 2017-12-16
 * Time: 11:31
 */
interface db
{
    function conn();
}

interface Factory
{
    function createDB();
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

class mysqlFactory implements Factory
{
    
    function createDB()
    {
        return new dbmysql();
    }
}

class sqliteFactory implements Factory
{
    
    function createDB()
    {
        return new dbsqlite();
    }
}
//后面在增加一个oracle

class oracle implements db
{
    
    function conn()
    {
       echo "orcale";
    }
}

class oracleFactory implements Factory
{
    
    function createDB()
    {
        return new oracle();
    }
}

//调用

$fact = new mysqlFactory();
$db = $fact->createDB();
$db ->conn();

$fact = new sqliteFactory();
$db = $fact->createDB();
$db ->conn();

$fact = new oracleFactory();
$db = $fact->createDB();
$db ->conn();

