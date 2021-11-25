<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
//require '../config/db.php';

$app = AppFactory::create();

$app->setBasePath("/api");
$app->get('/posts', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("all posts");
    // $sql = "SELECT * FROM posts";

    // $db = new DB();
    // $conn = $db->connect();

    // $stmt = $conn->query($sql);
    // $posts = $stmt->fetchALL(PDO::FETCH_OBJ);

    // $db = null;
    // $response->getBody()->write(json_encode($posts));
    // return $response
    //     ->withHeader('content-type', 'application/json')
    //     ->withStatus(200);
    return $response;
    
});
$app->get('/posts/popular', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("popular posts");
     return $response;
 });
$app->get('/posts/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $response->getBody()->write("post number $id");
    return $response;
});
$app->get('/posts/{id}/related', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $response->getBody()->write("related to post number $id");
    return $response;
});
  
