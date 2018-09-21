<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        
        // COnfigurações do Monolog
        'logger' => [
            'name' => 'app_log',
            'path' => BASEPATH . '/logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        
        // Configurações do Twig-View
        'twig-view' => [
            'templates' => BASEPATH . '/resources/views',
            // 'cache' => BASEPATH . '/tmp/cache/views',
            'cache' => false,
        ],
    ],
];