<?php

class sm{
    public static function url($input){
        return $_SESSION["fnd"]["app"]["urls"][$input];
    } // url()

    public static function dir($input){
        return $_SESSION["fnd"]["app"]["dirs"][$input];
    } // dir()

    public static function cus($input){
        return $_SESSION["fnd"]["app"]["custom"][$input];
    } // cus()

    public static function echoLink($name, $url = null, $attributes = []){ // This function only works for links that are part of the views folder
        
        // Leave URL empty for base
        $output_url = sm::url("base");

        // If URL has a value, assume dot-dir syntax and parse accordingly
        if(!empty($url)){
            $output_url .= str_replace(".", "/", $url);
        }

        empty($name) ? $name = $output_url : null;
        
        echo "<a href = '$output_url'>$name</a>";
    }
}
