<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Slim\Http\Request;
use Slim\Psr7\Stream;
use Slim\Exception\HttpNotFoundException;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->setBasePath("/api");

$app->options('/{routes:.+}', function ($request, $response, $args) {
  return $response;
});

$app->add(function ($request, $handler) {
  $response = $handler->handle($request);
  return $response
  //tak, wiem, ze tego wildcarda trzeba zmienic
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

require __DIR__ . '/../config/db.php';
require __DIR__ . '/../src/auth.php';
require __DIR__ . '/../src/categories.php';
require __DIR__ . '/../src/posts.php';
require __DIR__ . '/../src/images.php';

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
  throw new HttpNotFoundException($request);
});

// ładne komunikaty błędów ;)
// pierwszy argument powinien być ustawiony na false w środowisku produkcyjnym
// w prawdziwym projekcie, pewnie trzymalibyśmy to ustawienie w zmiennej środowiskowej
// [edit] dodałam jednak taką małą zmienną co imituje nam rozpoznawanie środowiska dev ;)
// - N.
$display_errors = false;
if (!empty($_SERVER['HTTP_HOST']) AND stripos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
  $display_errors = true;
}
$app->addErrorMiddleware($display_errors, true, true);

$app->run();
