<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require autoload file
require("vendor/autoload.php");
require("model/validation-functions.php");

session_start();

// Instantiate F3
$f3 = Base::instance();
$f3->set('colors', array('pink', 'green', 'blue'));

$controller = new Routes($f3);
//set debug level
$f3->set('DEBUG', 3);

// Define a default route
$f3->route('GET /', function () {
    $GLOBALS['controller']->home();
});

$f3->route('GET|POST /order', function() {
    $GLOBALS['controller']->order();
});

$f3->route('GET|POST /order2', function() {
    $GLOBALS['controller']->order2();
});

$f3->route('POST|GET /results', function() {
    $GLOBALS['controller']->result();
});

$f3->route('GET /@item', function($params){
    $item = $params['item'];
    $GLOBALS['controller']->randomRoute($item);
});
// Run F3
$f3->run();