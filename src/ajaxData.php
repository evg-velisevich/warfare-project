<?php
include '../../vendor/autoload.php';

use src\Script\Ajax;

ini_set("display_errors", "On");
error_reporting(E_ALL);

$ajax = new Ajax();
try {
    $ajax->startRender();
} catch (Exception $e) {

}
print_r($ajax->getReady()); // Get ready response
