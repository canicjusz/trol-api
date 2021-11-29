<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;

require '../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath("/api");

require '../config/db.php';

require './auth.php';
require './categories.php';
require './posts.php';

$app->run();
