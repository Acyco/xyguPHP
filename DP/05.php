<?php

/**
 * File: 05.php
 * User: Joye Chen
 * Date: 2017-12-16
 * Time: 11:46
 */

// 1. 普通类
/*
class sigle
{
    
}

$s1 = new sigle ();
$s2 = new sigle ();
if ($s1 === $s2) {
    echo "yes";
}else{
    echo "no";
}*/

// 2. 封锁new操作
/*
class sigle
{
    protected function __construct()
    {
    }
}*/


// 3.  留个接口来new对象

/*class sigle
{
    public static function getIns()
    {
        return new self();
    }
    protected function __construct()
    {
    }
}

$s1 = sigle::getIns();
$s2 = sigle::getIns();
if ($s1 === $s2) {
    echo "yes";
}else{
    echo "no";
}*/


// 4.  getins 先判断实例

/*class sigle
{
    protected static $ins = null;
    public static function getIns()
    {
        if(self::$ins == null){
            self::$ins = new self();
        }
        return self::$ins;
    }
    protected function __construct()
    {
    }
}

$s1 = sigle::getIns();
$s2 = sigle::getIns();
if ($s1 === $s2) {
    echo "yes";
}else{
    echo "no";
}

class multi extends sigle
{
    public function __construct()
    {
    }
}

$s1 = new multi();
$s2 = new multi();
if ($s1 === $s2) {
    echo "yes";
}else{
    echo "no";
}*/


// 5.  用final 防止继承修改权限
/*
class sigle
{
    protected static $ins = null;
    public static function getIns()
    {
        if(self::$ins == null){
            self::$ins = new self();
        }
        return self::$ins;
    }
    final protected function __construct()
    {
    }
}

$s1 = sigle::getIns();
$s2 = clone $s1;
if ($s1 === $s2) {
    echo "yes";
}else{
    echo "no";
}*/


// 6.  禁止clone

class sigle
{
    protected static $ins = null;
    
    public static function getIns()
    {
        if (self::$ins == null) {
            self::$ins = new self();
        }
        return self::$ins;
    }
    
    final protected function __construct()
    {
    }
    
    final protected function __clone()
    {
    }
}


$s1 = sigle::getIns();
$s2 = clone $s1;
if ($s1 === $s2) {
    echo "yes";
}else{
    echo "no";
}





