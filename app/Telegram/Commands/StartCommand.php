<?php

namespace Longman\TelegramBot\Commands;

use Longman\TelegramBot\Entities\ServerResponse;

class StartCommand extends UserCommand
{

    public function execute(): ServerResponse
    {
        return $this->replyToChat('Don\'t mind me, I\'m just testing a few things...');
    }

}