<?php

namespace globals;
use sm;

class global_functions{
    
    function breadcrumbs($separator = " &raquo; ", $home = "Home", $home_path = null){
        
        // Shorthand separator would be empty and default back
        if(empty($separator)) $separator = " &raquo; ";
        
        // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
        $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

        // This will build our "base URL" ... Also accounts for HTTPS :)
        $base = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

        // Find the value of the starting directory if the user doesn't want to go all the way back to base
        if(!empty($home_path)){
            $home_key = array_search($home_path, $path);
            $original_path = $path;
            $path = array_splice($path, $home_key - 1);
            // If the file is listed more than one sub-directory from the base URL, we have to build a new base before processing
            if($home_key > 1){
                foreach($original_path as $a => $b){
                    if($a < $home_key) $base .= $original_path[$a] . "/";
                }
            }
        }else{ // Home path is only needed if we're not already slicing the array
            // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
            $breadcrumbs = array("<a href=\"$base\">$home</a>");
        }

        // Build the rest of the breadcrumbs
        foreach ($path AS $x => $crumb) {
            // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
            $title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));
            
            // If we are not on the last index, then display an <a> tag
                if (next($path)){
                    $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
                    // Add crumb to base path so it follows the directory path
                    $base .= "$crumb/";
                // Otherwise, just display the title (minus)
                }else{
                    $breadcrumbs[] = $title;
                }
        }
        
        // Build our temporary array (pieces of bread) into one big string :)
        return implode($separator, $breadcrumbs);
    } // breadcrumbs()

    

} // class globals