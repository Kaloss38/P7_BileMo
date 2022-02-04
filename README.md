# P7 OPC - BileMo - Jonathan Billard

[![Maintainability](https://api.codeclimate.com/v1/badges/6df2aed6a4a003c31c0c/maintainability)](https://codeclimate.com/github/Kaloss38/P7_BileMo/maintainability)

Here, my first API with SYMFONY and ApiPlatform, let's clone to start it !

## Starting project

### requirements

- PHP 8.1+
- Composer
- Symfony @CLI

### Packages Installation

First, clone or download project then install all composer packages with command line : ``composer install``

### Create Database & create tricks fixtures

- Before creating database, setting database line in .env file

_your .env, database url line example_:
```
    DATABASE_URL="mysql://root:password@127.0.0.1:3306/bilemo?serverVersion=mariadb-10.4.11" 
```
- To create your database, run this command line : ``symfony console doctrine:database:create``
- Then to add datas : ``symfony console doctrine:fixtures:load``

### BileMO API Documentation

To access Api documentation, go on api route : ``http://127.0.0.1:8000/api``

### Symfony packages

- [Security bundle](https://symfony.com/doc/current/security.html)
- [Doctrine](https://symfony.com/doc/current/doctrine.html)
- [Validator & Doctrine annotations](https://symfony.com/doc/current/validation.html)

### Bundles
- [ApiPlatform](https://api-platform.com/)
- [JWT authentication](https://github.com/lexik/LexikJWTAuthenticationBundle)



