<?php

require_once "Ajax.php";

ini_set("display_errors", "On");
error_reporting(E_ALL);

$ajax = new Ajax();

if ($ajax->isValidRequest()) {
    try {
        $ajax->startRender();
    } catch (Exception $e) {}
} else {
    $ajax->setError('Неверный запрос');
}

$ajax->printResponse();
?>
