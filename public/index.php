<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
$app = AppFactory::create();
require './posts.php';


$app->setBasePath("/api");

$app->get('/categories', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("all categories");
    return $response;
});

$app->run();
