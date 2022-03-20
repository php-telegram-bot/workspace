<?php

use Longman\TelegramBot\Request;

require __DIR__ . '/../bootstrap.php';

$telegram = createTelegram();

$response = Request::deleteWebhook();

echo $response->getDescription() . PHP_EOL;