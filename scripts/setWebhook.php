<?php

require '../bootstrap.php';

$telegram = createTelegram();

$webhookUrl = env('APP_URL') . '/handle.php';
$response = $telegram->setWebhook($webhookUrl);

if (! $response->isOk()) {
    echo $response->getDescription() . PHP_EOL;
} else {
    echo "Webhook was set to {$webhookUrl}" . PHP_EOL;
}

