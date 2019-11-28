<?php

require_once "engine/Script.php";

$response = [
    'response' => '',
    'error' => false
];

ini_set("display_errors", "On");
error_reporting(E_ALL);

if (isset($_GET) && array_key_exists('user_id', $_GET) && isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
    $script = new Script("415593668", "b497fa458ca25f40fc1d43fcdce9aee1");
    $script->setActiveNet('vk');
    $socialPack = $script->socialGet($_GET['user_id']);
    if ($script->isCorrectPack($socialPack, $_GET['user_id'])) {
        $script->setUserModel(json_decode($socialPack[0][0][1], true));
        $response['response'] = $script->renderHtml();
    } else {
        $response['error'] = 'not have data';
    }
} else {
    $response['error'] = 'not have data';
}

print_r(json_encode($response,
    JSON_PRETTY_PRINT));