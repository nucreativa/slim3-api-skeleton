<?php
/**
 * Created by PhpStorm.
 * User: arywibowo
 * Date: 11/1/15
 * Time: 9:11 PM.
 */
$app->get('/version', 'endpoints\Base::getVersion');

$app->get('/', function ($request, $response, $args) {
    return $response->write("Hello World, it's a Slim Framework v3 based API :)");
});
