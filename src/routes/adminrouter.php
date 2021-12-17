<?php


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;



return function($app){
    $app->get('/admin/{adi}',function(Request $request,Response $response, $args){
        $adi = $args['adi'];
        $response->getBody()->write("admin router çalıştı $adi");
        return $response;
    });

    
};
