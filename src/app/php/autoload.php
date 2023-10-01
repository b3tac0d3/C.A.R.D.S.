<?php

if(empty($_SESSION)) session_start();

$php = $_SESSION["fnd"]["app"]["dirs"]["php"];
$depends = $_SESSION["fnd"]["app"]["dirs"]["depends"];

// Require all files in the src/app/php directory
require_once $php . "globals.php";
require_once $php . "short_map.php";
require_once $php . "view.php";
require_once $php . "controller.php";
require_once $php . "route_processor.php";
require_once $php . "framework.php";
require_once $php . "user_session.php";

// Require the proper plugins
require_once $depends . "aces/loader.php"; // Database
require_once $depends . "decks/loader.php"; // Error handling
require_once $depends . "folds/loader.php"; // Form building
require_once $depends . "spades/loader.php"; // Ajax