<?php

use Longman\TelegramBot\Exception\TelegramException;

require __DIR__ . '/../bootstrap.php';

$telegram = createTelegram();

// If there is a webhook, we delete it first
$telegram->deleteWebhook();

$telegram->useGetUpdatesWithoutDatabase();

while (true) {

    try {

        echo "Polling..." . PHP_EOL;
        $telegram->handleGetUpdates([
            'timeout' => 30,
        ]);

    } catch (TelegramException $e) {
        echo $e->getMessage() . PHP_EOL;
    }

}