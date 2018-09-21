<?php
// DIC configuration
$container = $app->getContainer();

// Monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Twig-View
$container['view'] = function ($c) {
    $settings = $c->get('settings')['twig-view'];
    $view = new \Slim\Views\Twig($settings['templates'], [
        'cache' => $settings['cache'],
        'debug' => true,
    ]);
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($c->get('router'), $basePath));
    // Habilitando a função para Debug
    $view->addExtension(new \Twig_Extension_Debug());
    return $view;
};

//Guzzle HTTP client
$container['httpClient'] = function($c) {
    $guzzle = new \GuzzleHttp\Client();
    return $guzzle;
};