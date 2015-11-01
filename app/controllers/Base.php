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
        global $logger;
        $logger->addInfo('Someone ask what version this API', array('ip' => $request->getIp()));

        return $response->write("Version 0.0.1");
    }

}