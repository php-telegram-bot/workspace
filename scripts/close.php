<?php

use Longman\TelegramBot\Request;

require '../bootstrap.php';

$telegram = createTelegram();

$response = Request::close();

echo $response->getDescription() . PHP_EOL;