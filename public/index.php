<?php
ini_set("display_errors","1"); // Apenas em Desenvolvimento
ERROR_REPORTING(E_ALL); // Apenas em Desenvolvimento
// Cria constante para o Diretorio Base do Aplicativo
// Sempre direciono a raiz do servidor para a pasta public
// Para evitar problema nas configurações, usar a variável
// com o objetivo de alcançar os diretórios na raiz do sistema
define('BASEPATH', dirname(__DIR__));

// Requer o arquivo de autoload do Composer
require __DIR__ . '/../vendor/autoload.php';

// Inicia a Sessão
// Verificar o funcionamento de Sessão no SLIM
session_start();

// Carrega o arquivo de configurações da Aplicação
$settings = require __DIR__ . '/../src/app/settings.php';

// Carrega uma instância da Aplicação
$app = new \Slim\App($settings);

// Carrega as dependências da Aplicação
require __DIR__ . '/../src/app/dependencies.php';

// Registra os Middlewares da Aplicação
require __DIR__ . '/../src/app/middleware.php';

// Registra as Rotas da Aplicação
require __DIR__ . '/../src/app/routes.php';

// Rodar a Aplicação
$app->run();