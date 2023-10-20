<?php

namespace document;
use document\ßview;
use sm;

class controller{
    public $variables;

    public $model_data;

    function get_view_data($file_name, $permission_required = 0){
        $view = new view();
        $view -> get_view_data($file_name);
        $view -> get_permission_data();
        // $view -> get_includes_data();
        $view -> get_layout_data();
        $view -> merge_layout_view_data();
        $view -> output_merged_data();
    } // run_class_objectives()

    function get_controller($file_name, $permission_required = 0){
        
        // Controller name
        $new_file_name = $file_name;

        /* 
            This allows the option to call a specific function in the request string or 
            just load the controller and assume it knows what to do from the route_list file.
            Example: $route -> parse("home@method")
        */
        if(strpos($file_name, "@")){
            $function_name = substr($file_name, strpos($file_name, "@") + 1);
            $new_file_name = substr($file_name, 0, strpos($file_name, "@"));
        }

        /*
            Calls a class name that is different than the standard naming convention.
            Standard controller files will have class and file named identical. This allows
            for classes with differing names to be used.
            Example:
                Default: 
                    View File: home
                    Controller File: home_controller
                    Controlelr Class: home_class
                Non-Standard:
                    View File: home
                    Controller File: home_controller
                    Controller Class: new_home_class
            Class names are defined at the end of the call string and preceeded by a colon ":"
            Example:
                $route -> parse("home:class@method")
                    or
                $route -> parse("home:class") if the methods auto-run under __construct()
        */
        if(strpos($file_name, ":")){
            $class_name = substr($file_name, strlen(":")+strpos($file_name, ":"), (strlen($file_name) - strpos($file_name, "@"))*(-1));
            $new_file_name = substr($new_file_name, 0, strpos($new_file_name, ":"));
        }else{
            // Default class name based on naming conventions
            $class_name = "\\" . $new_file_name . "_controller";
        }

        require_once sm::dir("controllers") . $new_file_name . ".php";
        $controller = new $class_name;
        
        if(!empty($function_name)) $controller -> $function_name();

    } // get_controller()
} // class controller
