<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use \Firebase\JWT\JWT;


require '../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
require '../config/db.php';
$secret = $_ENV['SECRET'];
$app = AppFactory::create();

$app->setBasePath("/api");

$app->add(new Tuupola\Middleware\JwtAuthentication([
    "path" => ["/api/posts", "/api/categories"], 
    "algorithm" => ["HS256"],
    "secret" => $secret
]));

require './categories.php';
require './posts.php';


$app->get('/token', function (Request $request, Response $response, array $args) {
    $payload = "XD";
    global $secret; 
    $token = JWT::encode($payload, $secret, "HS256");   
    $response->getBody()->write( $token);
      return $response;   
});

$app->run();
