<?php

$app_name = "cards";

return array(
/************
Dev
************/
"dev" => array(
/*    
Set for dev only. Must be set to 0 in prod. If set to 0, debug mode will not work.
- If a hard change is made to foundation variables during dev, change $reset_foundatoin to true for changes to take effect on next page load.
- If FOUNDATION[DEV][DEV_MODE] is set to true, foundation will automatically reset on each page load.
*/
"dev_mode" => 1,

/*
Used for dev only.
dev: $debug_mode = 1;
prod: $debug_mode = 0;
*/
"debug_mode" => 1,

/*
The type of errors you want to receive. Set to 0 for production.
Debug Level
0) Off
1) [Low] Major errors only
2) [Medium] Major errors and warnings
3) [High] Major errors, warnings and notices (E-ALL)
*/
"debug_level" => 3
), // $dev array

/************
App
************/
"app" => array(
/* App or site name */
"app_name" => $app_name,

/* Server environment */
"app_env" => "linux",

/* Base directory where src file is located */
"base_dir" => $base_dir = $_SERVER["DOCUMENT_ROOT"] . "/$app_name",

/* Base URL for site */
"base_url" => $base_url = "http://localhost/$app_name",

// Sub-Directory for URL/URI purposes
"base_uri_ext" => "$app_name/",

// Cache pages and scripts
"app_cache" => 0,


/************
Base URL Paths
************/
"urls" => array(

"base" => $base_url . "/", // Redundant for simple short_mappings functionality later

"src" => $src = $base_url . "/src/",

"views" => $src . "views/",

"controllers" => $src . "controllers/",

"app" => $app = $src . "app/",

"user" => $user = $src . "user/",

"css" => $app . "css/",

"js" => $app . "js/",

"php" => $php = $app . "php/",

"img" => $app . "img/",

"forms" => $app . "forms/",

"user_css" => $user . "css/",

"user_js" => $user . "js/",

"user_php" => $user . "php/",

"user_img" => $user . "img/",

"user_forms" => $user . "forms/",

"plugins" => $app . "plugins/",

"depends" => $app . "dependencies/",

"logs" => $app . "logs/"
), // "urls array

"dirs" => array(

"base" => $base_dir . "/",
    
"src" => $src = $base_dir . "/src/",

"routes" => $src . "routes/",

"views" => $src . "views/",

"controllers" => $src . "controllers/",

"app" => $app = $src . "app/",

"user" => $user = $src . "user/",

"css" => $app . "css/",

"js" => $app . "js/",

"php" => $php = $app . "php/",

"img" => $app . "img/",

"forms" => $app . "forms/",

"user_css" => $user . "css/",

"user_js" => $user . "js/",

"user_php" => $user . "php/",

"user_img" => $user . "img/",

"user_forms" => $user . "forms/",

"plugins" => $app . "plugins/",

"depends" => $app . "dependencies/",

"logs" => $app . "logs/"
), // $dirs array

/************
Plugins Paths - Stand-alone plugins that containt depndencies which the framework is built with.
************/
"plugins" => array(
// SQL
"aces" => $plugins . "aces/",

// Errors
"decks" => $plugins . "decks/",

// Logging
"flops" => $plugins . "flops/",

// Form Building
"folds" => $plugins . "folds/",

// Ajax Quick Library
"spades" => $plugins . "spades/"
) // $plugins array
), // $app array

/************
db
************/
"db" => array(
/* Connection Type */
"connection" => "mysql",

/* Host name */
"host" => "localhost",

/* Default charset */
"charset" => "utf8mb4",

/* Default port */
"port" => "3306",

/* Database name */
"database" => "cards",

/* SQL user */
"username" => "root",

/* SQL password */
"password" => "root"
) // $db array
); // $fdn array
?>