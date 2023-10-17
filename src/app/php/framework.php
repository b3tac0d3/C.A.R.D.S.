<?php

namespace framework;
use sm;

class nav{

    function build_nav_link($name, $input_path = null, $class = null){
        /* 
            -- July 10, 2023
            -- b3tac0d3
            This function is basically temporary to make the nav work. Consider making more useful in the future
            with better URI reading or redoing in javascript just for fun.
        */
        $aria = null;

        if(!str_contains($class ?? 0, "spadeScript")) 
            $href = sm::url("base") . $input_path;
        else
            $href = $input_path;
        
        $hard_path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        

        if(array_search($input_path, $hard_path)){
            $class = "active";
            $aria = "aria-current='page'";
        }elseif(count($hard_path) == 1 && $name == "Home"){
            $class = "active";
            $aria = "aria-current='page'";
        }

        return 
            "<li class='nav-item'>
                <a href='$href' class='nav-link $class' $aria>
                    $name
                </a>
            </li>";
    } // build_nav_link()

} // class siteNav