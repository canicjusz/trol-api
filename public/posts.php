<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$joinedTables = `(SELECT a.Posts, a.Categories, b.Authors from _categoriestoposts a join _authorstoposts b ON b.Posts=a.Posts) c
JOIN posts d ON d.ID=c.Posts JOIN authors e ON e.ID=c.Authors JOIN categories f ON f.ID=c.Categories`;

$app->get('/posts', function (Request $request, Response $response, array $args) {
    global $joinedTables;
    $query = "SELECT d.Date AS PostDate, d.Title, d.Background, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, f.Name AS CategoryTitle from " . $joinedTables;
    $posts = getFromDatabase($query);
    
    $response->getBody()->write(json_encode($posts));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->get('/posts/popular', function (Request $request, Response $response, array $args) {
    $query = "SELECT Date AS PostDate, Title, Background from posts ORDER BY Viewcount DESC LIMIT 5";
    $posts = getFromDatabase($query);
    $response->getBody()->write(json_encode($posts));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->get('/posts/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    global $joinedTables;
    $query = "SELECT d.Date AS PostDate, d.Title, d.Background, d.Content, d.Viewcount, e.Name AS AuthorName, e.Avatar, f.Name AS CategoryTitle from " . $joinedTables;
    $db_response = getFromDatabase($query);
    if(count($db_response) == 1){
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
    // global $query_every_post;
    $queryCategories = "SELECT Categories FROM `_categoriestoposts` WHERE posts=$id";
    $categories = getFromDatabase($queryCategories)[0];

    $category = $queryCategories->CategoryTitle;

    $db = null;

    $queryPostsId = "SELECT Posts FROM `_categoriestoposts` WHERE posts=$id LIMIT 2";
    $postsIds = getFromDatabase($queryPostsId);

    $idsForQuery = "";
    $postsLength = count($postsIds);
    if($postsLength !== 0){
        for($i = 0; $i < count($postsIds); $i++){
            if($i == 0){
                $idsForQuery = $idsForQuery . " AND ";
            }else{
                $idsForQuery = $idsForQuery . " OR ";
            }
            $idsForQuery = $idsForQuery . $postsIds[$i];
        }
    };

    $queryPosts = "SELECT Background, Title FROM `posts` WHERE $idsForQuery";
    $posts = getFromDatabase($queryPosts);
    // trza usunac ten post co juz jest
    $response->getBody()->write(json_encode($posts));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});
  
