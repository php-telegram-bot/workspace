## About this repository

This repository is a boilerplate for development of the [php-telegram-bot](https://github.com/php-telegram-bot/core).

## Getting Started

### Cloning the repository

```shell
git clone --recurse-submodules https://github.com/php-telegram-bot/workspace.git
```

After cloning the workspace, you can use the workspace as if it were a project. 
We provided a few scripts and a docker-compose.yml that configures a webserver and a local Telegram Bot API server for using and testing webhooks.

### Working on php-telegram-bot
To work on the php-telegram-bot repository itself you need to `cd` into the `packages/php-telegram-bot` directory and checkout a branch with 
```shell
git checkout develop
```

To pull all the current changes from upstream you can call from any location
```shell
git submodule update --remote --merge
```

If you want to commit changes to upstream, you can simply do that as anywhere else.

## Using Docker

By default the Docker setup launches preconfigured with the following containers:

1. **nginx** _Webserver_
   - to accept webhook calls from the custom bot api server
2. **php-fpm** _PHP 8.1_
   - runs all the code
3. **mariadb** _Database_
   - already has the structure imported
4. **[tdlight](https://github.com/tdlight-team/tdlight-telegram-bot-api)** _Custom Bot API Server_
   - Lighter version of the custom Telegram bot API server.

To start the container copy the `.env.example` into a `.env` file and fill out your `TELEGRAM_API_ID` and `TELEGRAM_API_HASH` data from https://my.telegram.org/apps.

After this you can start the containers with
```shell
docker-compose up -d
```

## Using the bot

By default there is a /start command.

So if you've also filled out your `TELEGRAM_BOT_USERNAME` and `TELEGRAM_BOT_TOKEN` in your `.env` file, you can execute the `setWebhook.php` inside the php Docker container.

If successful, you should be able to send a `/start` to your bot.


## Manually calling the webserver

**WIP**