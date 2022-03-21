<div id="top"></div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-this-repository">About this repository</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#cloning-the-repository">Cloning the repository</a></li>
        <li><a href="#working-on-php-telegram-bot">Working on php-telegram-bot</a></li>
      </ul>
    </li>
    <li><a href="#using-docker">Using Docker</a></li>
    <li><a href="#using-the-bot">Using the bot</a></li>
  </ol>
</details>

## About this repository

This repository is a boilerplate for development of the [php-telegram-bot](https://github.com/php-telegram-bot/core).

<p align="right">(<a href="#top">back to top</a>)</p>

## Getting Started

### Cloning the repository

```shell
git clone --recurse-submodules https://github.com/php-telegram-bot/workspace.git
```

After cloning the workspace, you can use the workspace as if it were a project. We provided a few scripts and a
docker-compose.yml that configures a webserver and a local Telegram Bot API server for using and testing webhooks.

### Working on php-telegram-bot

To work on the php-telegram-bot repository itself you need to `cd` into the `packages/php-telegram-bot` directory and
checkout a branch with

```shell
git checkout develop
```

To pull all the current changes from upstream you can call from any location

```shell
git submodule update --remote --merge
```

If you want to commit changes to upstream, you can simply do that as anywhere else.

<p align="right">(<a href="#top">back to top</a>)</p>

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

To start the container copy the `.env.example` into a `.env` file and fill out your `TELEGRAM_API_ID`
and `TELEGRAM_API_HASH` data from https://my.telegram.org/apps.

After this you can start the containers with

```shell
docker-compose up -d
```

<p align="right">(<a href="#top">back to top</a>)</p>

## Using the bot

By default there is a /start command.

So if you've also filled out your `TELEGRAM_BOT_USERNAME` and `TELEGRAM_BOT_TOKEN` in your `.env` file, you can execute
the `setWebhook.php` inside the php Docker container.

If successful, you should be able to send a `/start` to your bot.

<p align="right">(<a href="#top">back to top</a>)</p>

## Manually calling the webserver

If you need to call the webserver directly or have a look at the stats of the Bot API server you can create
a `docker-compose.override.yml` file and add the needed port forwarding like in this example:

```yaml
version: '3'
services:
  nginx:
    ports:
      - 8080:80
        
  api-server:
    environment:
      TELEGRAM_STAT: yes
    ports:
      - 8082:8082
```

The first block inside `services` extends the nginx service and adds a port forwarding from 8080 (on your host) to 80 inside the container.
You can then call any php script or static files with `http://localhost:8080`

The second block extends the api-server service, enables the stats with an environment variable and forwards the port 8082 from the container to your host.
This allows you to call `http://localhost:8082` to access the stats page of the Telegram Bot API server and check i.e. if the webhook was registered correctly.