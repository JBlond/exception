<?php

use jblond\exception\ExceptionHandler;

require '../vendor/autoload.php';

$debug = true;

if ($debug == false) {
    $exception = new ExceptionHandler(false, false);
    error_reporting(0);
    ini_set('display_errors', 'Off');
} else {
    $exception = new ExceptionHandler(true, true);
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}
