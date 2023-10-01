<?php

use document\controller;

class home_controller extends controller{
    
    function __construct(){
        //echo "You've called your class!";
        $this -> home();
    }

    function home(){
        $this -> get_view_data("home");
    }

    function test(){
        echo "you've called test";
    }

}