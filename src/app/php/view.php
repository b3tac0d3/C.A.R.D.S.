<?php

namespace document;
use decks\decks;
use sm;

/* 
    URL Load Directive
    1) Directory
    2) File
    3) 404
    
    |||||||||||||||||||
    Regex Expressions
    |||||||||||||||||||
    
    Capture everything in 3 groups (sections, bodies, endsections) not split correctly in array
    "/(\@section\(\S+\))(\s.*)\s(@endsection)/"

    Capture everything as one group per section for post splitting
    "/\@section\(\S+\)\s.*\s@endsection/"

    Capture @section start tag and name only
    /"\@section\(\S+\)"/

    Capture @endsection tag only (used to catch next in line and close section var)
    /"\@endsection"/

    Capture {{variable}}
    /"\{\{\S+\}\}/gi"/

    Search with negative look behind for escaping strings
    v1.0 "/\(?<!\\)\@section\(\S+\)/i"
    v2.0 "/(?<!\\\)\@section\(\S+'\)/i"

*/

class view{

    private $src_path;
    private $view_file_found;
    private $view_file_name;
    private $view_file_data;
    private $views_path;
    private $layout_file_name;
    private $layout_file_data;
    private $layout_file_found;
    private $includes_file;
    private $output_data;
    private $error_status;
    private $error_handler;

    function __construct(){
        if(empty($_SESSION)) session_start();
        $this -> error_status = 0;
        $this -> src_path = sm::dir("src");
        $this -> views_path = sm::dir("views");
        $this -> error_handler = new decks();
    } // __construct()

    function get_view_data($view_file_url){
        $view_file_url = $this -> views_path . $view_file_url;
        $view_file_found = false;
        if(is_dir($view_file_url)){
            $view_file_url .= "/index.php";
            $view_file_found = true;
        }elseif(is_file($view_file_url .= ".php")){
            $view_file_found = true;
        }else{
            $this -> error_status = 1;
            //$this -> error_handler -> mk_error(404);
            echo "404 error. FIX THIS LATER IN ERROR CHECKING! view.php/71<br><br>view_file_url=$view_file_url";
        }

        if($view_file_found == true){
            $this -> view_file_name = $view_file_url; // Not used but saved for later applications
            $this -> view_file_found = true;
            ob_start();
                include_once($view_file_url);
                $this -> view_file_data = ob_get_clean();
            if (ob_get_contents()) ob_end_clean();
        }
        
        return $this -> view_file_data;
    } // get_view_data()

    function get_includes_data(){
        if(!empty(preg_match("/(?<!\\\)@includes\(\S+.\)/i", $this -> view_file_data, $includes))){
            $this -> includes_file = preg_replace(array("/@includes\(/i", "/\)/"), "", $includes[0]);
            $ifn = str_replace(".", "/", $this -> includes_file) . ".php";
            require_once sm::dir("views") . $ifn;
        }
    }

    function get_layout_data(){
        if(!empty(preg_match("/(?<!\\\)@layout\(\S+.\)/i", $this -> view_file_data, $layout))){
            $this -> layout_file_name = preg_replace(array("/@layout\(/i", "/\)/"), "", $layout[0]);
            $lfn = $this -> views_path . str_replace(".", "/", $this -> layout_file_name) . ".php";
            if(is_file($lfn)){
                ob_start();
                    include_once($lfn);
                    $this -> layout_file_data = ob_get_clean();
                if (ob_get_contents()) ob_end_clean();
                // Make sure sections get picked up with double or single quotes
                preg_replace("/(?<!\\\)@yield\(\S+\)/", "/(?<!\\\)@yield\(\S+\)/", $this -> layout_file_data);
            }else{
                $this -> error_handler -> mk_error(1, "Did you misname your layout file?");
            }
        }
        return $this -> layout_file_data;
    } // get_layout_data()
    
    function merge_layout_view_data(){
        $layout_file_data = $new_layout_file_data = $this -> layout_file_data;
        $view_file_data = $new_view_file_data = $this -> view_file_data;
        $yield_count = 0;
        $yields = array();
    
        $this -> output_data = $layout_file_data;

        if(!empty($layout_file_data)){
            // Process layout file data
            preg_match_all("/@yield\(\S+\)/i", $layout_file_data, $found_yields);
            $yield_count = count($found_yields[0]);
            $found_yields = $found_yields[0];

            for($i = 0; $i < $yield_count; $i++){
                $yield_name = substr($found_yields[$i], 6, strlen($found_yields[$i]) - 6);
                $yields[] = substr($yield_name, 1, strlen($yield_name) - 2);
            } // for

            // Process view file data
            preg_match_all("/((?<!\\\)\@section\(\S+\))(.*?)((?<!\\\)\@endsection)/sm", $view_file_data, $found_sections);

            // One the .000001% off chance that there's a reference to an @section or @endsection, fix the backslasmes
            $found_sections[2] = str_replace("\@section", "@section", $found_sections[2]);
            $found_sections[2] = str_replace("\@endsection", "@endsection", $found_sections[2]);
            
            // Merge the two data sets and remove additional @yield's that might not be fulfilled
            if(count($yields) > 0){
                foreach($yields as $y){
                    $section_found = array_search("@section($y)", $found_sections[1]);
                    if($section_found !== false){
                        $this -> output_data = str_replace("@yield($y)", $found_sections[2][$section_found], $this -> output_data);
                    }else{
                        // Remove unused yields
                        $this -> output_data = str_replace("@yield($y)", "", $this -> output_data);
                    }
                } // for
            } // if(count($yields) > 0)
        }else{ // No layout file, view file only
            $this -> output_data = $view_file_data;
        }

    } // merge_layout_view_data()

    function output_merged_data(){
        echo $this -> output_data;
    } // output_merged_data()


} // class page_load