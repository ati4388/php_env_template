<?php


    error_reporting(E_ALL);
    ini_set("display_errors", 1);


    require __DIR__.'/../vendor/autoload.php';

    use Dotenv\Dotenv;

    $dotEnv = Dotenv::createImmutable(realpath(__DIR__.'/../'));
    $dotEnv->load();
    echo 'The username is: ' .$_ENV["DB_HOST"] . '!';
