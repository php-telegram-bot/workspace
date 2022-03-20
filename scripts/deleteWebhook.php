<?php

use Longman\TelegramBot\Request;

require '../bootstrap.php';

$telegram = createTelegram();

$response = Request::deleteWebhook();

echo $response->getDescription() . PHP_EOL;