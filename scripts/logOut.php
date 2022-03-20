<?php

use Longman\TelegramBot\Request;

require '../bootstrap.php';

$telegram = createTelegram();

$response = Request::logOut();

echo $response->getDescription() . PHP_EOL;