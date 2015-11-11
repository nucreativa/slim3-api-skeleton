<?php
/**
 * Created by PhpStorm.
 * User: arywibowo
 * Date: 11/11/15
 * Time: 5:45 PM
 */

/**
 * Medoo Initialization
 * Full Documentation on http://medoo.in/
 */
require_once __DIR__. '/../vendor/catfan/medoo/medoo.php';
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => getenv('DB_NAME'),
    'server' => getenv('DB_HOST'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'charset' => 'utf8'
]);
$app->db = $database;