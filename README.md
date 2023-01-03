# Lendflow

## Using the environment

```
docker-compose up -d
```

Running without -d will keep docker in foreground.

You will then be able to access the application by pointing your browser
to http://localhost:8081.

## Installation

Regardless of the environment setup method, there are some common steps to be performed:

1. `$ composer install`
1. `$ composer db:migrations:run`

## Using the mysql server from host (localhost)

*You will need a mysql client, be it console one or GUI like SequelPro.

```
mysql -u root -p root -h 127.0.0.1 -P 6620
```

## Using different hostname(s)

Nginx will respond to any hostname, adding values to `/etc/hosts` will work just like with brew variety.

## PHPStorm xdebug integration

Detailed setup can be found on this url: https://dev.to/brpaz/docker-phpstorm-and-xdebug-the-definitive-guide-14og
Bare in mind that we used 9003 port 
