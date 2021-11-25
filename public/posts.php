<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get('/posts', function (Request $request, Response $response, array $args) {
     $sql = "SELECT d.Date AS PostDate, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, e.Bio, f.Name AS CategoryTitle
     from
     (SELECT a.Posts, a.Categories, b.Authors from _categoriestoposts a join _authorstoposts b ON b.Posts=a.Posts) c
     JOIN posts d ON d.ID=c.Posts
     JOIN authors e ON e.ID=c.Authors
     JOIN categories f ON f.ID=c.Categories";

     $db = new DB();
     $conn = $db->connect();

     $stmt = $conn->query($sql);
     $posts = $stmt->fetchALL(PDO::FETCH_OBJ);

     $db = null;
     $response->getBody()->write(json_encode($posts));
     return $response
         ->withHeader('content-type', 'application/json')
         ->withStatus(200);
    return $response;
    
});
$app->get('/posts/popular', function (Request $request, Response $response, array $args) {
    $sql = "SELECT d.ID, d.Date AS PostDate, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, e.Bio, f.Name AS CategoryTitle
    from
    (SELECT a.Posts, a.Categories, b.Authors from _categoriestoposts a join _authorstoposts b ON b.Posts=a.Posts) c JOIN posts d ON d.ID=c.Posts
    JOIN authors e ON e.ID=c.Authors
    JOIN categories f ON f.ID=c.Categories  
    ORDER BY `d`.`Viewcount`  DESC";

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
$app->get('/posts/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "SELECT d.Date AS PostDate, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, e.Bio, f.Name AS CategoryTitle
    from
    (SELECT a.Posts, a.Categories, b.Authors from _categoriestoposts a join _authorstoposts b ON b.Posts=a.Posts) c JOIN posts d ON d.ID=c.Posts
    JOIN authors e ON e.ID=c.Authors
    JOIN categories f ON f.ID=c.Categories
    WHERE d.ID=$id";

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
$app->get('/posts/{id}/related', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
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
  
