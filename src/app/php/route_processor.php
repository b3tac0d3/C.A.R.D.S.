<?php

namespace document;
use document\controller;
use session\user_session;

class route extends controller{

    public $variables;
    private $file_name;
    private $permission_required = 0;
    private $static_view;
    // private $;

    function view($file_name, $route_type = "get"){
        // This gets a static view with no controller
        $this -> static_view = 1;
        $this -> parse($file_name, $route_type);
    } // view()

    function parse($file_name, $route_type = "get"){
        // If script test fails, continue on
        $this -> file_name = $file_name;
        switch(strtolower($route_type)){
            case "get":
            case "": // Empty for shorthand functions when using permissions
            case 0: // Alternate empty option
                $this -> variables = $_GET;
                break;
            case "post":
                $this -> variables = $_POST;
                break;
            case "request":
                $this -> variables = $_REQUEST;
                break;
            default:
                echo "Route parse route type is incorrect. Check routing file.";
                exit;
        }
        $this -> get_route();
    } // parse()

    function sess(){
        // Checking of user session for logged in pages
        $sess = new user_session();
        $validated = $sess -> validate_user_session();
        if($validated == -1){
            header("location: session_expired");
        }else if($validated == 0){
            header("location: login_required");
        }else{
            // If the session is good, log the latest activity so it doesn't expire needlessly
            $sess -> add_user_session_last_activity();
        }
        return $this;
    } // sess()

    function perm($permission_required){
        // Checking of user role for page loads
        
        // Start by checking session so user only has to use perm functions instead of both
        $this -> sess();
        
        // If session is valid, check required permissions
        if(empty($_SESSION)) session_start();
        if($_SESSION["user_session"]["main_role"] < $permission_required){
            header("location: permission_required");
            exit;
        }
        return $this;
    } // perms()

    function set_perm($permission_required){
        $this -> permission_required = $permission_required;

        return $this;
    } // set_perm()

    function run_script($file){
        // Script is passed automatically in the scope
        require_once $file;
    } // run_script()

    private function get_route(){
        // No controller. View file only
        if($this -> static_view == 1){
            $this -> get_view_data($this -> file_name, $this -> permission_required);
            return;
        }
        $this -> get_controller($this -> file_name, $this -> permission_required);
    } // get_route()

    public static function get_uri(){
        $uri = $_SERVER['REQUEST_URI'];
        if(strpos($uri, "?")){
            $uri = substr($uri, 1, (strpos($uri, "?") - 1));
        }else{
            $uri = substr($uri, 1);
        }
        // URI Prepend
        // If local server or sub-directory, this is where we make the URI match what it would be
        if(!empty($base_uri_ext = $_SESSION["fnd"]["app"]["base_uri_ext"])) $uri = str_replace($base_uri_ext, "", $uri);
        return $uri;
    } // get_uri()
} // class route