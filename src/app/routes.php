<?php
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/', function (Request $request, Response $response, array $args) {
    // $this->logger->info("Acesso à rota '/'");
    $response->getBody()->write("Página Inicial para Testes!");
    return $response;
});

// Testando Twig-View
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    return $this->view->render($response, 'hello/hello.html', [
        'name' => $args['name'],
    ]);
});
