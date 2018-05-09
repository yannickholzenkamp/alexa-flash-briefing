<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

require 'config.php';

class Requests {

    static function root(Request $request, Response $response, array $args) {
        $messages = array();

        foreach (Config::define() as $getter) {
            $getter->build();
            array_push($messages, $getter->get());
        }

        return $response->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($messages, JSON_UNESCAPED_UNICODE));
    }

}

?>
