<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

function getPostsFromDatabase($query){
    //nie wiem czemu ale to nie dziala jak jest w global scope i musialem tutaj to dac
    // ------------------------------------------------------------------------------
    // bo zmienne z global scope nie są dostępne wewnątrz funkcji, 
    // dopóki nie określisz, że interpreter PHP ma szukać zmiennej poza funkcją,
    // a można to zrobić poprzez `global $nazwa_zmiennej`,
    // ale ogólnie zmienne globalne nie są dobrą praktyką, choć mają pewne zalety ;)
    // https://www.php.net/manual/en/language.variables.scope.php
    // - N.
    // ------------------------------------------------------------------------------
    $query_every_post = "SELECT d.Date AS PostDate, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, e.Bio, f.Name AS CategoryTitle
from (SELECT a.Posts, a.Categories, b.Authors from _categoriestoposts a join _authorstoposts b ON b.Posts=a.Posts) c
JOIN posts d ON d.ID=c.Posts JOIN authors e ON e.ID=c.Authors JOIN categories f ON f.ID=c.Categories";
    $db = new DB();
    $conn = $db->connect();

    $stmt = $conn->query($query_every_post . $query);

    // nie wiem czy to potrzebne ale niech zostanie
    $db = null;
    return $stmt->fetchALL(PDO::FETCH_OBJ);
}

$app->get('/posts', function (Request $request, Response $response, array $args) {
    $posts = getPostsFromDatabase("");
    
    $response->getBody()->write(json_encode($posts));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->get('/posts/popular', function (Request $request, Response $response, array $args) {
    $posts = getPostsFromDatabase(" ORDER BY d.Viewcount DESC LIMIT 0, 5");
    $response->getBody()->write(json_encode($posts));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->get('/posts/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $db_response = getPostsFromDatabase(" WHERE d.ID=$id");
    if(count($db_response)==1){
    $post=$db_response[0];
    $response->getBody()->write(json_encode($post));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
    
  } else{
    $response->getBody()->write(json_encode(["status" => "404", "message" => "Post not found"]));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(404);

  } });

$app->get('/posts/{id}/related', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $currPost = getPostsFromDatabase(" WHERE d.ID=$id")[0];

    $category = $currPost->CategoryTitle;

    $db = null;

    $posts = getPostsFromDatabase(" WHERE f.Name='$category' AND NOT d.ID=$id");
    // trza usunac ten post co juz jest
    $response->getBody()->write(json_encode($posts));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});
  
