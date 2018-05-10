<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

require 'config.php';

class Requests {

    static function root(Request $request, Response $response, array $args) {
        $messages = array();

        foreach (Config::define() as $instance) {
            if ($instance->getLoader() != null) {
                $instance->getLoader()->init($instance);
                $instance->getLoader()->load();
            }
            $instance->getGetter()->init($instance);
            $instance->getGetter()->build();
            array_push($messages, $instance->getGetter()->get());
        }

        return $response->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($messages, JSON_UNESCAPED_UNICODE));
    }

}

?>
