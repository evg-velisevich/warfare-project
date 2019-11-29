<?php
include '../../vendor/autoload.php';

use src\Script\Ajax;

ini_set("display_errors", "On");
error_reporting(E_ALL);

$ajax = new Ajax();

if ($ajax->isValidRequest()) {
    try {
        $ajax->startRender();
    } catch (Exception $e) {
    }
} else {
    $ajax->setError('Неверный запрос');
}

print_r($ajax->getReady());
