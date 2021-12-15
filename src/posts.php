<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

$joinedTables = "(SELECT a.Posts, a.Categories, b.Authors from _categoriestoposts a join _authorstoposts b ON b.Posts=a.Posts) c JOIN posts d ON d.ID=c.Posts JOIN authors e ON e.ID=c.Authors JOIN categories f ON f.ID=c.Categories";

$app->get('/posts', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    global $joinedTables;
    $params = $request->getQueryParams();
    $querybase = "SELECT d.ID, d.Date AS PostDate, d.Title, d.Background, d.Content_shortened, d.Viewcount, e.Name AS AuthorName, e.Avatar, f.Name AS CategoryTitle from $joinedTables";
    $query;
     if(isset($params["limit"]) && isset($params["offset"])){
        $limit = $params["limit"];
        $offset = $params["offset"];
        if(intval($limit) < 0){
            $response->getBody()->write(json_encode(["status" => "404", "message" => "Limit can't be below 0"]));
            return $response
                ->withHeader('content-type', 'application/json')
                ->withStatus(404);

        }
        if(isset($params["search"])){
            $search = $params["search"];
            $query = $querybase . " WHERE d.Title LIKE ? OR d.Content LIKE ? LIMIT ? OFFSET ?";
            $parameters = ["%$search%", "%$search%", intval($limit), intval($offset)];
            $posts = getFromDatabase($query, $parameters);
        }
        else{
            $query = $querybase . " ORDER BY d.date DESC LIMIT ? OFFSET ?";
            $parameters = [intval($limit), intval($offset)];
            $posts = getFromDatabase($query, $parameters);
        }
    }else{
        $query = $querybase;
        $posts = getFromDatabase($query);
    }
    
    $response->getBody()->write(json_encode(["status" => "200", "json" => $posts]));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->get('/posts/popular', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    $query = "SELECT ID, Date AS PostDate, Title, Background from posts ORDER BY Viewcount DESC LIMIT 3";
    $posts = getFromDatabase($query);

    $response->getBody()->write(json_encode(["status" => "200", "json" => $posts]));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->get('/posts/{id}', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    $id = $args['id'];
    global $joinedTables;
    $query = "SELECT d.Date AS PostDate, d.Title, d.Background, d.Content, d.Viewcount, e.Name AS AuthorName, e.Avatar,e.Bio, f.Name AS CategoryTitle from " . $joinedTables . " WHERE d.ID=?";
    $parameters = [intval($id)];
    $db_response = getFromDatabase($query, $parameters);

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

    $queryCategoriesId = "SELECT Categories FROM `_categoriestoposts` WHERE posts=?";
    $parameters = [intval($id)];
    $categoriesIdObj = getFromDatabase($queryCategoriesId, $parameters);

    if(count($categoriesIdObj) == 1){
        $categoriesId = $categoriesIdObj[0]->Categories;
        $queryPostsId = "SELECT Posts FROM `_categoriestoposts` WHERE categories=? AND NOT Posts=? LIMIT 2";
        $postsIds = getFromDatabase($queryPostsId, [$categoriesId, intval($id)]);
    
        $postsLength = count($postsIds);
        //moze byc max 2 postow wyswietlanych z ta sama kategoria wiec nie ma po co wymyslac jakiejs pentli
        //trzeba pozniej wymyslic lepsze nazwy do tych zmiennyc
        $idsForQuery = "";
        if($postsLength >= 1){
            $firstId = $postsIds[0]->Posts;
            $idsForQuery .= "WHERE ID=?";
            $posts_parameters = [intval($firstId)];
            if($postsLength == 2){
                $secondId = $postsIds[1]->Posts;
                $idsForQuery .= " OR ID=?";
                array_push($posts_parameters, intval($secondId));
            }
            $queryPosts = "SELECT ID, Background, Title FROM `posts` ". $idsForQuery;
            $posts = getFromDatabase($queryPosts, isset($posts_parameters) ? $posts_parameters :null);
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