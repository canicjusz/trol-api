<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use \Firebase\JWT\JWT;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$secret = $_ENV['SECRET'];
 $app->add(new Tuupola\Middleware\JwtAuthentication([
     "path" => ["/api/posts", "/api/categories"], 
     "algorithm" => ["HS256"],
     "secret" => $secret,
     "error" => function ($response, $arguments) {
         $data["status"] = "401";
         $data["message"] = $arguments["message"];
         return $response
             ->withHeader("Content-Type", "application/json")
             ->getBody()->write(json_encode($data));
     }
 ]));


 $app->get('/token', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
     $payload = "XD";
     global $secret; 
     $token = JWT::encode($payload, $secret, "HS256");   
     $response->getBody()->write( json_encode(["status"=>"200","token"=>$token]));
       return $response;   
 });
