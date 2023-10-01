<?php

namespace models;
use aces;

class users extends aces\query{

    function get_all_users(){
        return $this -> select("users");
    }
}