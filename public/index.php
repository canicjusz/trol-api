<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
require '../config/db.php';

$app = AppFactory::create();

$app->setBasePath("/api");

require './categories.php';
require './posts.php';

$app->run();
