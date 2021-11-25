<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


$app->get('/categories', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("all categories");
    return $response;
});
