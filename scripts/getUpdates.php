<?php

use Longman\TelegramBot\Exception\TelegramException;

require '../bootstrap.php';

$telegram = createTelegram();

// If there is a webhook, we delete it first
$telegram->deleteWebhook();

while (true) {

    try {

        $telegram->handleGetUpdates([
            'timeout' => 30,
        ]);

    } catch (TelegramException $e) {
        echo $e->getMessage() . PHP_EOL;
    }

}