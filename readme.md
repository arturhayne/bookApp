# About

- Laravel 5.6
- No Session to identify users

# Requirements
- php 5.6 ou higher [tutorial](http://tecadmin.net/install-php5-on-ubuntu/)
- composer [tutorial](https://getcomposer.org/doc/00-intro.md#globally)
- postgres

## Development
- composer install
- php artisan key:generate
- php artisan migrate ok
- php artisan db:seed ok
- cp .env.example .env

##Run
- php artisan serve --port=5000