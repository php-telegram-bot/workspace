<?php

require __DIR__ . '/../bootstrap.php';

$telegram = createTelegram();

$webhookUrl = env('APP_URL') . '/handle.php';
$response = $telegram->setWebhook($webhookUrl);

echo $response->getDescription() . PHP_EOL;