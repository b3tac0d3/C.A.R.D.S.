<?php
session_start();
new auto_load;

class auto_load{

private $setup_vars;

function __construct(){
    // Check to see if dev hard cache reset is ordered
    $this -> check_preloader();
    // Set up session data for page loads if not already set
    $this -> set_foundation();
    // Load the php files and final resources
    $this -> load_resources();
} // __construct()

function check_preloader(){
    require_once("preloader.php");
    
    // Stop function if no need to run
    if(constant("reset_foundation") == 0) return;

    $file_name = "preloader.php";
    $temp_name = "preloader.php";

    $base_file = fopen($file_name, "r") or die("Unable to open file!");
    
    $data = fread($base_file, filesize($file_name));
    $data = str_replace(1, 0, $data);
    
    $temp_file = fopen($temp_name, "w") or die("Unable to open file!");
    fwrite($temp_file, $data);
    
    fclose($base_file);
    fclose($temp_file);

    // Clear session info for clean slate
    $_SESSION = null;
    session_unset();
    session_destroy();

    // Clear server cache
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    
    $this -> set_foundation();
} // check_preload()

function set_foundation(){
    // Only set foundation info if not already set
    if(isset($_SESSION["fnd"]["id"])) return;
    
    // Get control info from hard code lib file
    $this -> setup_vars = require_once "init.php";
    
    // Set session with control variable data
    $_SESSION["fnd"] = $this -> setup_vars;

    // Set dynamic session info
    $_SESSION["fnd"]["open"] = time();
    $_SESSION["fnd"]["id"] = session_id();

    /* 
    Debugging is set up here instead of the autoload function because
    the values can't change unless the setup.php file has been updated.
    */

    // Set debugging informaiton from setup_vars
    // Debug mode will not work if dev mode is not active
    if($_SESSION["fnd"]["dev"]["debug_mode"] == 1 || $_SESSION["fnd"]["dev"]["dev_mode"] == 1){
        switch($_SESSION["fnd"]["dev"]["debug_level"]){
            default:
            case "0":
                ini_set("display_errors", "off");
                error_reporting(~E_ALL);
                break;
            case "1":
                ini_set("display_errors", "on");
                error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
                break;
            case "2":
                ini_set("display_errors", "on");
                error_reporting(~E_ALL & ~E_NOTICE);
                break;
            case "3":
                ini_set("display_errors", "on");
                error_reporting(E_ALL);
                break;
        } // case()
    } // if

    // Set cache settings
    $this -> set_cache_control();

} // set_foundation()

function set_cache_control(){
    // If app_cache == 1, do nothing. Else, set no-cache mode
    if(isset($this -> setup_vars["app_cache"]) && $this -> setup_vars["app_cache"] == 1) return;
    // Dev cache control
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
} // set_cache_control()

function load_resources(){
    $php = $_SESSION["fnd"]["app"]["dirs"]["php"];
    // Added to separate file so resources can be loaded on independent scripts (login, register, etc)
    require_once $php . "autoload.php";

    // Get routes file to direct traffic
    require_once "src/routes/routes_list.php";
} // load_resource()

} // class auto_load
?>