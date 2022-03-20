<?php

if (! function_exists('env')) {
    function env($key, $default = null) {
        return $_ENV[$key] ?? $default;
    }
}

if (! function_exists('info')) {
    function logInfo($message) {
        $message = date("[Y-m-d H:i:s] ") . $message . PHP_EOL;
        file_put_contents(__DIR__ . '/logs/php-telegram-bot.log', $message, FILE_APPEND);
    }
}