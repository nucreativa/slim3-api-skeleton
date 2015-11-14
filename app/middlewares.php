<?php
/**
 * Created by PhpStorm.
 * User: arywibowo
 * Date: 11/2/15
 * Time: 12:16 AM.
 */
$checkProxyHeaders = true; // Note: Never trust the IP address for security processes!
$trustedProxies = ['10.0.0.1', '10.0.0.2']; // Note: Never trust the IP address for security processes!
$app->add(new \RKA\Middleware\IpAddress($checkProxyHeaders, $trustedProxies));

$stream = new \Monolog\Handler\StreamHandler(__DIR__.'/../log/app.log', \Monolog\Logger::DEBUG);
$logger = new \Monolog\Logger('app');
$logger->pushHandler($stream);
$app->add(function ($request, $response, $next) use ($logger) {
    $response = $next($request, $response);
    $uri = $request->getUri()->getPath();
    $statusCode = $response->getStatusCode();
    switch ($response->getStatusCode()) {
        case 500:
            $logger->addCritical('Oops!!! the server got 500 error', [
                'ip' => $request->getAttribute('ip_address'),
                'uri' => $uri,
                'status' => $statusCode,
            ]);
            break;
        case 404:
            $logger->addWarning('Someone calling un-existing API endpoint', [
                'ip' => $request->getAttribute('ip_address'),
                'uri' => $uri,
                'status' => $statusCode,
            ]);
            break;
        default:
            $logger->addInfo('Someone calling existing API endpoint', [
                'ip' => $request->getAttribute('ip_address'),
                'uri' => $uri,
                'status' => $statusCode,
            ]);
            break;
    }

    return $response;
});
