<?php

namespace rbac;

class rbac{
    function check_user_page($permission_required){
        if($this -> perm_check($permission_required) == 0) header("location: error_permission_required");
        return;
    } // validate_user_permission

    function check_user_perm($permission_required){
        return $this -> perm_check($permission_required);
    }

    private function perm_check($permission_required){
        // If session is valid, check required permissions
        if(empty($_SESSION)) session_start();
        if($_SESSION["user_session"]["main_role"] < $permission_required)
            return 0;
        else
            return 1;
    }
} // class rbac

?>