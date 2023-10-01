<?php

namespace documentation;
use globals;

class docs{

    function load_doc_list($dir, $url = null){
        $doc_files = scandir($dir);
        $url = "http://localhost/cards/docs/$url";
        foreach($doc_files as $file){
            if($file == "." || $file == ".." || $file == "index.php") continue;
            $file = str_replace(".php", "", $file);
            /*************************************
            This is just for the plugins directory to show the descriptions of the files
            *************************************/
            match($file){
                "aces" => $descrip = "(Automated Concise Effortless SQL)",
                "decks" => $descrip = "(Dynamic Error-handling and Code Kit System)",
                "flops" => $descrip = "(Fast Logging and Output Processing System)",
                "folds" => $descrip = "(Form Object Library and Designer System)",
                "spades" => $descrip = "(Streamlined PHP AJAX Development Engine Software)",
                default => $descrip = ""
            };
            echo "<li class = 'list-group-item'><a href = '$url$file'>".ucwords($file)."</a> <span class = 'description'>$descrip</span></li>";
        }
    } // load_doc_files()

    function breadcrumb($start_directory = null){
        $g = new globals\global_functions();
        echo $g -> breadcrumbs("", "Home", $start_directory);
    } // breadcrumb()

}