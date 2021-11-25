<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


$app->get('/categories', function (Request $request, Response $response, array $args) {
     $sql = "SELECT name FROM categories";

     $db = new DB();
     $conn = $db->connect();

     $stmt = $conn->query($sql);
     $posts = $stmt->fetchALL(PDO::FETCH_OBJ);

     $db = null;
     $response->getBody()->write(json_encode($posts));
     return $response
         ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});
