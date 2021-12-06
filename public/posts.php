<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

$joinedTables = "(SELECT a.Posts, a.Categories, b.Authors from _categoriestoposts a join _authorstoposts b ON b.Posts=a.Posts) c JOIN posts d ON d.ID=c.Posts JOIN authors e ON e.ID=c.Authors JOIN categories f ON f.ID=c.Categories";

$app->get('/posts', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    global $joinedTables;
    $params = $request->getQueryParams();
    $query;
     if(isset($params["limit"]) && isset($params["after"])){
        $limit = $params["limit"];
        $after = $params["after"];
        if(intval($limit) < 0){
            $response->getBody()->write(json_encode(["status" => "404", "message" => "Limit can't be below 0"]));
            return $response
                ->withHeader('content-type', 'application/json')
                ->withStatus(404);
        }
        if(isset($params["search"])){
            $search = $params["search"];
            $query = "SELECT d.Date AS PostDate, d.Title, d.Background, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, f.Name AS CategoryTitle from $joinedTables WHERE d.Title LIKE '%$search%' OR d.Content LIKE '%$search%' LIMIT $limit, $after";
        }
        else{
            $query = "SELECT d.Date AS PostDate, d.Title, d.Background, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, f.Name AS CategoryTitle from $joinedTables LIMIT $limit, $after";
        }
    }else{
        $query = "SELECT d.Date AS PostDate, d.Title, d.Background, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, f.Name AS CategoryTitle from $joinedTables";
    }
    $posts = getFromDatabase($query);
    
    $response->getBody()->write(json_encode(["status" => "200", "json" => $posts]));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->get('/posts/popular', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    $query = "SELECT Date AS PostDate, Title, Background from posts ORDER BY Viewcount DESC LIMIT 5";
    $posts = getFromDatabase($query);

    $response->getBody()->write(json_encode(["status" => "200", "json" => $posts]));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->get('/posts/{id}', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    $id = $args['id'];
    global $joinedTables;
    $query = "SELECT d.Date AS PostDate, d.Title, d.Background, d.Content, d.Viewcount, e.Name AS AuthorName, e.Avatar, f.Name AS CategoryTitle from " . $joinedTables . " WHERE d.ID=$id";
    $db_response = getFromDatabase($query);

    if(count($db_response) == 1){
        $post=$db_response[0];
        $response->getBody()->write(json_encode(["status" => "200", "json" => $post]));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(200);
    }else{
        $response->getBody()->write(json_encode(["status" => "404", "message" => "Post with such id doesn't exist"]));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(404);
    }
});

$app->get('/posts/{id}/related', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    $id = $args['id'];

    $queryCategoriesId = "SELECT Categories FROM `_categoriestoposts` WHERE posts=$id";
    $categoriesIdObj = getFromDatabase($queryCategoriesId);

    if(count($categoriesIdObj) == 1){
        $categoriesId = $categoriesIdObj[0]->Categories;
        $queryPostsId = "SELECT Posts FROM `_categoriestoposts` WHERE categories=$categoriesId AND NOT Posts=$id LIMIT 2";
        $postsIds = getFromDatabase($queryPostsId);
    
        $postsLength = count($postsIds);
        //moze byc max 2 postow wyswietlanych z ta sama kategoria wiec nie ma po co wymyslac jakiejs pentli
        //trzeba pozniej wymyslic lepsze nazwy do tych zmiennyc
        if($postsLength >= 1){
            $firstId = $postsIds[0]->Posts;
            $idsForQuery = "WHERE ID=$firstId";
            if($postsLength == 2){
                $secondId = $postsIds[1]->Posts;
                $idsForQuery .= " OR ID=$secondId";
            }
            $queryPosts = "SELECT Background, Title FROM `posts` $idsForQuery";
            $posts = getFromDatabase($queryPosts);
        }
    
        $response->getBody()->write(json_encode(["status" => "200", "json" => $posts ?? []]));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(200);
    }else{
        $response->getBody()->write(json_encode(["status" => "404", "message" => "Post with such id doesn't exist"]));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(404);
    }
});
