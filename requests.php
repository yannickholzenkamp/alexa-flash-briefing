<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

class Requests {

    static function root(Request $request, Response $response, array $args) {
        $alb = new Alb_Getter('app/data/alb/output.json');
        $alb->build();

        return $response->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->write($alb->get());
    }

}

?>
