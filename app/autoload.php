<?php
/**
 * Created by PhpStorm.
 * User: arywibowo
 * Date: 11/1/15
 * Time: 10:39 PM.
 */
foreach (glob(__DIR__.'/controllers/*.php') as $file) {
    if (is_file($file)) {
        require_once $file;
    }
}
