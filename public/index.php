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
// ------------------------------------------
// error handling później dodamy tutaj
// - M. 
// https://techdocs.broadcom.com/us/en/ca-enterprise-software/layer7-api-management/api-management-oauth-toolkit/4-4/apis-and-assertions/error-codes.html
// ------------------------------------------
// $app->add(new Tuupola\Middleware\JwtAuthentication([
//     "path" => ["/api/posts", "/api/categories"], 
//     "algorithm" => ["HS256"],
//     "secret" => $secret,
//     "error" => function ($response, $arguments) {
//         $data["status"] = "error";
//         $data["message"] = $arguments["message"];
//         return $response
//             ->withHeader("Content-Type", "application/json")
//             ->getBody()->write(json_encode($data));
//     }
// ]));

require './categories.php';
require './posts.php';


// $app->get('/token', function (Request $request, Response $response, array $args) {
//     $payload = "XD";
//     global $secret; 
//     $token = JWT::encode($payload, $secret, "HS256");   
//     $response->getBody()->write( $token);
//       return $response;   
// });

$app->run();
