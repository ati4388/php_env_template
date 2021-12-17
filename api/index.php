<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

require __DIR__.'/../vendor/autoload.php';

$dotEnv = Dotenv::createImmutable(realpath(__DIR__.'/../'));
$dotEnv->load();

// echo getenv("DB_HOST");
//die($_ENV["DB_HOST"] ." ÖLDÜM");

require __DIR__.'/../src/config/postgresdao.php';


$app = AppFactory::create();

// $adminRouterFunction = require __DIR__."/../src/routes/adminrouter.php";
// $adminRouterFunction($app);

require __DIR__."/../src/routes/userrouter.php";

$routeAdmin = require __DIR__."/../src/routes/adminrouter.php";
$routeAdmin($app);
// $app->get('/{adi}',function(Request $request,Response $response, $args){
//     $adi = $args['adi'];
//     $response->getBody()->write("çalıştı $adi");
//     return $response;
// });



$app->run();
