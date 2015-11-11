<?php
date_default_timezone_set('Asia/Jakarta');

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// Create and configure Slim app
$app = new \Slim\App();

require __DIR__ . '/../app/config.php';

require __DIR__ . '/../app/middlewares.php';

require __DIR__ . '/../app/controllers.php';

require __DIR__ . '/../app/routes.php';

// Run app
$app->run();