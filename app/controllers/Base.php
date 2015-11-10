<?php
/**
 * Created by PhpStorm.
 * User: arywibowo
 * Date: 11/1/15
 * Time: 9:07 PM
 */

namespace controllers;

Class Base {

    static function getVersion ($request, $response, $args) {
        return $response->write("Version 0.0.2");
    }

}