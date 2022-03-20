<?php

use Longman\TelegramBot\Exception\TelegramException;

require 'bootstrap.php';

$telegram = createTelegram();

try {

    $telegram->handle();

} catch (TelegramException $e) {

    logInfo($e->getMessage());

}