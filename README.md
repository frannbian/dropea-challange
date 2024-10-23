# Dropea Challange

Service that connect to "Public Api" to fill entities table

## Features

- Public API Integration
- Commands
- Entity CRUD
- Cached responses

## Installation

```sh
git clone https://github.com/frannbian/dropea-challange
cd dropea-challange
cp .env.example .env
composer install
php artisan migrate
php artisan db:seed --class="CategorySeeder"

```

#### How to get entries from public API
There is a command that fill the "entries" table from Public API service

``` bash
php artisan entities:get-entities
```

#### How to run pint

``` bash
./vendor/bin/pint
```

#### How to run test

``` bash
./vendor/bin/phpunit
```

#### Documentation

The API documentations are on postman collection

## Packages

This project is currently extended with the following packages.

| Plugin | README |
| ------ | ------ |
| Pint            | [https://laravel.com/docs/11.x/pint && https://cs.symfony.com/doc/rules/index.html] |
| PHPUnit            | [https://phpunit.de/index.html] |
