<?php

/**
 * File: 09.php
 * User: Joye Chen
 * Date: 2017-12-24
 * Time: 22:24
 */
class brand
{
    public $power = 1;
    protected $top = "admin";
    
    public function process($lev)
    {
        if ($lev <= $this->power) {
            echo "版主删贴";
        } else {
            $top = new $this->top;
            $top->process($lev);
        }
    }
}

class admin
{
    public $power = 2;
    protected $top = "public";
    public function process($lev)
    {
        if ($lev <= $this->power) {
            echo "管理员封号";
        } else {
            $top = new $this->top;
            $top->process($lev);
        }
    }
}

class pulice
{
    public $power = 3;
    protected $top = null;
    public function process($lev)
    {
   
   
        echo "抓起来";
    }
}

$lev = $_POST["jubao"];
$jubao = new brand();
$jubao->process($lev);
