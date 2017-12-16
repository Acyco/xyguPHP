<?php

/**
 * File: 01.php
 * User: Joye Chen
 * Date: 2017-12-16
 * Time: 10:32
 */
abstract class Tiger
{
    public abstract function climb();
}

class XTiger extends Tiger
{
    public function climb()
    {
        echo "摔";
    }
    
}

class MTiger extends Tiger
{
    
    public function climb()
    {
        echo "树顶";
    }
}

class Cat
{
    public function climb()
    {
        echo "飞天";
    }
}

class Client
{
    public static function call(Tiger $animal)
    {
        $animal->climb();
    }
}

Client::call(new MTiger);
Client::call(new XTiger);
Client::call(new Cat());