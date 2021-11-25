<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

function getFromDatabase($query){
    $db = new DB();
    $conn = $db->connect();

    $stmt = $conn->query($query_every_post . $query);

    // nie wiem czy to potrzebne ale niech zostanie
    $db = null;
    return $stmt->fetchALL(PDO::FETCH_OBJ);
}

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
