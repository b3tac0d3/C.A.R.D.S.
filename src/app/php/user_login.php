<?php

namespace user;
use aces;
use spades\spades;
use session\user_session;

if(empty($_SESSION)) session_start();
require_once $_SESSION["fnd"]["app"]["dirs"]["php"] . "autoload.php";;

$login = new user_login();

switch($_GET["script"] ?? null){
    default:
    case "logout":
        $login -> logout();
        break;
    case "user_login":
        $login -> check_user_login();
        break;
}

class user_login{

    private $user_data_array;

    private $inp_username;

    private $inp_password;

    private $inp_rememberMe;

    private $user_role;

    function check_user_login(){

        
        $query_start_time = microtime(true);
    
        $this -> inp_username = $_REQUEST["username"];
        $this -> inp_password = $_REQUEST["password"];
        $this -> inp_rememberMe = $_REQUEST["rememberMe"] ?? null;

        $ajax = new spades();

        $this -> query_user_info($this -> inp_username);

        if($this -> test_user_name() == false){
            // User not found. Create message and call it.
            echo $ajax -> quickMsg("Username or password not found.");
            return;
        }

        if($this -> test_user_password() == false){
            // User found but password bad. Create message and call it.
            echo $ajax -> quickMsg("Username or password not found!");
            return;
        }

        // If we've made it this far, go ahread and log in
        $session = new user_session;
        $session -> create_user_session($this -> inp_username, $this -> user_data_array["main_role"]);
        $ajax -> setRedirect("dashboard");
        echo $ajax -> mkJson();
        
        return;
    } // check_user_login()
    
    function query_user_info($username){
        $db = new aces\query();
        $this -> user_data_array = $db -> set_where("username", $username) -> set_return("1") -> select("users");
    } // query_user_info()

    function test_user_name(){
        return !empty($this -> user_data_array) ? true : false;
    } // test_user_name()

    function test_user_password(){
        $db_hash = $this -> user_data_array["password"];
        $salt = $this -> user_data_array["password_salt"];
        $password = $this -> inp_password . $salt;
        return password_verify($password, $db_hash) ? true : false;
    } // test_user_password()

    function logout(){
        $session = new user_session();
        $ajax = new spades();

        $session -> end_user_session();
        $ajax -> setRedirect("home");
        
        echo $ajax -> mkJson();
        return;
    }
} // class login