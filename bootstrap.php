<?php

use Longman\TelegramBot\Request;

require 'vendor/autoload.php';

define('BASE_PATH', __DIR__);

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function createTelegram() {
    static $telegram;

    if (! $telegram) {
        if ($botApiUri = env('TELEGRAM_BOT_API_SERVER')) {
            Request::setCustomBotApiUri($botApiUri);
        }

        $telegram = new \Longman\TelegramBot\Telegram(
            env('TELEGRAM_BOT_TOKEN'),
            env('TELEGRAM_BOT_USERNAME')
        );

        $telegram->addCommandsPath(__DIR__ . '/app/Telegram/Commands');
    }

    return $telegram;
}
