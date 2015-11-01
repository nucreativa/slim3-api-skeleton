<?php
date_default_timezone_set('Asia/Jakarta');

require __DIR__ . '/../vendor/autoload.php';

/* Log Configuration */
$stream = new \Monolog\Handler\StreamHandler(__DIR__ . '/../log/app.log', \Monolog\Logger::DEBUG);
$logger = new \Monolog\Logger('app');
$logger->pushHandler($stream);

// Create and configure Slim app
$app = new \Slim\App();

require __DIR__ . '/../app/controllers.php';

require __DIR__ . '/../app/routes.php';

// Run app
$app->run();