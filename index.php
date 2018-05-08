<?php

date_default_timezone_set("Europe/Berlin");
setlocale(LC_ALL, 'de_DE');

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

require 'vendor/autoload.php';
require 'requests.php';
spl_autoload_register('autoloader');

$app = new \Slim\App;
$app->get('/', function(Request $request, Response $response, array $args) { 
    Requests::root($request, $response, $args);
});
$app->run();

function autoloader($classname) {
    $folder = explode('_', $classname);
    $file = 'app/classes/' . strtolower(implode('/', $folder)) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

?>
