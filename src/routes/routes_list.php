<?php

use document\route;

$route = new route();
$inbound_route = route::get_uri();

match($uri = $inbound_route){
    default => $route -> view($uri),    
    "", "/", "home" => $route -> parse("home"),

    // Logged in routes
    "dashboard" => $route -> sess() -> view("dashboard")
};

?>