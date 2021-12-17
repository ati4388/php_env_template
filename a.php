<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include("file_with_errors.php");

$dotEnv = Dotenv::createImmutable(realpath(__DIR__));
$dotEnv->load();
echo 'The username is: ' .$_ENV["DB_HOST"] . '!';
