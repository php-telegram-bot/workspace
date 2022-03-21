#!/bin/bash

composer install --no-interaction --quiet

if [ ! -f .env ]; then
  cp .env.example .env
fi

php scripts/setWebhook.php

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

exec "$@"