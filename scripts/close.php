<?php

use Longman\TelegramBot\Request;

require '../bootstrap.php';

$telegram = createTelegram();

$response = Request::close();

if (! $response->isOk()) {
    echo $response->getDescription() . PHP_EOL;
} else {
    echo 'close was successful.' . PHP_EOL;
}