<?php

date_default_timezone_set("Europe/Berlin");
setlocale(LC_ALL, 'de_DE');

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

require 'vendor/autoload.php';
spl_autoload_register('autoloader');

$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response, array $args) {
    $alb = new Alb_Getter('app/data/alb/output.json');
    $alb->build();

    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write($alb->get());
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
