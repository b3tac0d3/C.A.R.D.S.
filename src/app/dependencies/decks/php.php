<?php
// Troubleshooting and Error Analysis System
namespace decks;

class decks{
    
    function __construct(){
        //echo "decks loaded";exit;
    } // __construct()
    
    function mk_warning($error_code = 1, $response_text = "ERROR", $callback = null){
        // Return error message but continue running scripts if possible
        echo $response_text;
    } // mk_warning

    function mk_error($error_code = 1, $response_text = "Error handled by DECK system.<br>Please see references below for error issues.", $callback = null){
        // Return error message and stop all subsequent scripts from running
        define("error_message", $response_text);
        define("error_details", $error_code);
        require_once "views/404.php";
        exit;
    } // mk_error()
} // class decks

/* 

    CUSTOM ERROR PAGES AND LOADING FROM PAGES BASED ON VARS PASSED BY FUNCTION CALL
    BUILT IN CUSTOM PAGES
    CUSTOM DEV PAGE WITH SPECIAL DEBUGGING SECTIONS
    CUSTOM 404 AND 500 PAGES

*/
?>