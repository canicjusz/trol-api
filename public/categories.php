<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get('/categories', function (Request $request, Response $response, array $args) {
    $categories = getFromDatabase("SELECT name FROM categories");
    $response->getBody()->write(json_encode($categories));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});
