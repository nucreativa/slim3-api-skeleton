<?php

date_default_timezone_set('Asia/Jakarta');

require __DIR__.'/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

$container = new \Slim\Container();

/* REDIS */
$container['redis'] = function ($container) {
    return new \Predis\Client([
        'scheme' => 'tcp',
        'host' => getenv('REDIS_HOST'),
        'port' => getenv('REDIS_PORT'),
    ]);
};

/* MEDOO */
$container['medoo'] = function ($container) {
    require_once __DIR__.'/../vendor/catfan/medoo/medoo.php';

    return new medoo([
        'database_type' => getenv('DB_TYPE'),
        'database_name' => getenv('DB_NAME'),
        'server' => getenv('DB_HOST'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'charset' => 'utf8',
    ]);
};

// Create and configure Slim app
$app = new \Slim\App($container);

require __DIR__.'/../app/autoload.php';

require __DIR__.'/../app/middlewares.php';

require __DIR__.'/../app/routes.php';

// Run app
$app->run();
