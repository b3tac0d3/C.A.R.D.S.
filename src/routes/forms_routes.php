<?php

require_once "../app/php/autoload.php";

use document\route;

$route = new route();
$script = $_GET["script"];

return match($script){
    "user_login" => $route -> run_script(sm::dir("php") . "user_login.php")
}

?>