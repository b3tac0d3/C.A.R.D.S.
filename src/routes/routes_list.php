<?php

use document\route;

$route = new route();
$inbound_route = route::get_uri();

match($uri = $inbound_route){
    default => $route -> view($uri),    
    "", "/", "home" => $route -> parse("home"),
    "login" => $route -> public_only() -> view("login"),
    // Logged in routes
    "dashboard" => $route -> sess() -> view("dashboard")
};

?>