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
class dbmysql
{
    public function conn()
    {
        echo "mysql";
    }
}
class dbsqlite
{
    
    function conn()
    {
        echo "sqlite";
    }
}

$db = new dbmysql();