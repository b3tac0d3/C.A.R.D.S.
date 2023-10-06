<?php 

namespace session;

if(empty($_SESSION)) session_start();

switch($_GET["script"] ?? null){}

class user_session{

    function create_user_session($user_name, $user_role, $user_id){ // pass info in array instead of variables?
        // Set user session variables
        $user_session["login_time"] = time();
        $user_session["session_expire"] = 1800; // 30 minutes
        $user_session["last_activity"] = time(); // Updates with every click or change if not passed expiration limit
        $user_session["user_name"] = $user_name;
        $user_session["main_role"] = $user_role;
        $user_session["user_id"] = $user_id;
        // Set session variables
        $_SESSION["user_session"] = $user_session;
        return 1;
    } // create_user_session()

    function validate_user_session(){
        /* 
        Two tasks here
            1) Validate session existence *** Returns 0
            2) Validate session hasn't expired *** Returns -1
            *** Good session returns 1
        */

        // Session not valid or not set
        if(empty($_SESSION["user_session"])) return 0;
        
        
        $sess = $sessLastAct = $_SESSION["user_session"];
        $curTime = time();
        $sessExpire = $sess["last_activity"] + $sess["session_expire"];
        
        // Session expired
        if($sessExpire < $curTime) return -1;

        // If we've made it this far, return true
        return 1;
    } // check_user_session()

    function add_user_session_last_activity(){
        $_SESSION["user_session"]["last_activity"] = time();
    } // add_user_session_last_activity()

    function end_user_session(){
        $_SESSION["user"]["session"] = null;
        session_unset();
        session_destroy();
        return $this;
    } // end_user_session()
} // class session\user_session
?>