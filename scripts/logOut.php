<?php

use Longman\TelegramBot\Request;

require '../bootstrap.php';

$telegram = createTelegram();

$response = Request::logOut();

if (! $response->isOk()) {
    echo $response->getDescription() . PHP_EOL;
} else {
    echo 'logOut was successful.' . PHP_EOL;
}