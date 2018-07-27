# About

- Laravel 5.6
- No Session to identify users

# Requirements
- php 5.6 ou higher [tutorial](http://tecadmin.net/install-php5-on-ubuntu/)
- composer [tutorial](https://getcomposer.org/doc/00-intro.md#globally)
- postgres

## Development
- composer global require "laravel/installer=~1.1"
- chmod **777** -R storage or chmod -R +rw storage (mac)
- chmod **777** -R bootstrap/cache or chmod -R +rw bootstrap/cache (mac)
- cp .env.example .env

- composer install
- php artisan key:generate
- php artisan migrate ok
- php artisan db:seed ok

##Run
- php artisan serve --port=5000