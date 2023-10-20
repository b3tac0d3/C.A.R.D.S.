<?php

namespace todo;
use aces;

class todo{

    function fetch_todos(){
        $db = new aces\query();

        return $db -> set_select_column() -> select("todo_main");
    }

}

?>