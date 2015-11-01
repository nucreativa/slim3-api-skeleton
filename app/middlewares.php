<?php
/**
 * Created by PhpStorm.
 * User: arywibowo
 * Date: 11/2/15
 * Time: 12:16 AM
 */

foreach(glob(__DIR__ . '/middlewares/*.php') as $file) {
    require_once $file;
}