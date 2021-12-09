<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Slim\Http\Request;
use Slim\Psr7\Stream;

$app->get('/imgs/{name}', function  (ServerRequestInterface $request, ResponseInterface $response, array $args) {
  $name = $args['name'];
  $path = __DIR__ . '../imgs/'.$name;

  $fh = fopen($path, 'rb');
  $file_stream = new Stream($fh);

  return $response->withBody($file_stream)
      // ->withHeader('Content-Disposition', 'attachment; filename='.$name.';')
      ->withHeader('Content-Type', mime_content_type($path))
      ->withHeader('Content-Length', filesize($path));
});
