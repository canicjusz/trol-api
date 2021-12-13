<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use \Firebase\JWT\JWT;

// $secret = "supersecret";

// $app->add(new Tuupola\Middleware\JwtAuthentication([
//     "secure" => false,
//     "path" => ["/api/posts", "/api/categories"], 
//     "algorithm" => ["HS256"],
//     "secret" => $secret,
//     "error" => function ($response, $arguments) {
//         $data["status"] = "401";
//         $data["message"] = $arguments["message"];
//         return $response
//             ->withHeader("Content-Type", "application/json")
//             ->getBody()->write(json_encode($data));
//         }
// ]));

// $app->post('/login', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
//     global $secret; 
//     $params = $request->getQueryParams();
//     if(
//         isset($params["email"], $params["password"])
//     ){
//         $email=$params["email"];
//         $password=$params["password"];
//         $query = "SELECT Has_access FROM Credentials WHERE Password='$password' AND Email='$email'";
//         $matching_credentials = getFromDatabase($query);
//         if(
//             isset($matching_credentials[0])&&$matching_credentials[0]->Has_access=='1'
//         ){
//             $future = new DateTime("now +7 days");
//             $jti = base64_encode(random_bytes(10));
//             $payload = [
//                 "jti" => $jti,
//                 "exp" => $future->getTimeStamp()
//             ];
//             $token = JWT::encode($payload, $secret, "HS256");   
//             $response->getBody()->write( json_encode(["status"=>"200","token"=>$token]));
//             return $response
//             ->withHeader('content-type', 'application/json')
//             ->withStatus(200);
//         }else{
//             $response->getBody()->write( json_encode(["status"=>"404","message"=>'not found']));
//             return $response
//             ->withHeader('content-type', 'application/json')
//             ->withStatus(404);
//         }
//     }else{
//         $response->getBody()->write( json_encode(["status"=>"404","message"=>'provide credentials']));
//             return $response
//             ->withHeader('content-type', 'application/json')
//             ->withStatus(200);
//     }
// });
