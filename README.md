# Lendflow

## Using the environment

```
docker-compose up -d
```

Running without -d will keep docker in foreground.

You will then be able to access the application by pointing your browser
to http://localhost:8081.

## Installation

Setup should be done automatically when containers are up. If for any reason setup wasn't done properly, you should manually run some commands
1. `$ docker exec -it lendflow_app_1 bash`
2. `$ composer install`
3. `$ chmod -R 777 storage`
4. `$ chmod 777 bootstrap/cache`
5. `$ php artisan config:cache && php artisan config:clear && php artisan cache:clear`


## Using different hostname(s)

Nginx will respond to any hostname, adding values to `/etc/hosts` will work just like with brew variety.
