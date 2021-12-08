<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

$app->get('/categories', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    $categories = getFromDatabase("SELECT name FROM categories");
    $response->getBody()->write(json_encode(["status" => "200", "json" => $categories]));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});
