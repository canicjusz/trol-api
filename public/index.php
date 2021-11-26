<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath("/api");

require '../config/db.php';

require './auth.php';
require './categories.php';
require './posts.php';

$app->run();
