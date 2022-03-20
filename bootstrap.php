<?php

require 'vendor/autoload.php';

define('BASE_PATH', __DIR__);

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function createTelegram() {
    static $telegram;

    if (! $telegram) {
        $telegram = new \Longman\TelegramBot\Telegram(
            env('TELEGRAM_BOT_TOKEN'),
            env('TELEGRAM_BOT_USERNAME')
        );

        $telegram->addCommandsPath(__DIR__ . '/app/Telegram/Commands');
    }

    return $telegram;
}
