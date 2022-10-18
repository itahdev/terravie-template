<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# HND-Terravie backend for User
The simply method to set up this project (for development only) is using [Docker](https://docs.docker.com/) and [Docker Compose](https://docs.docker.com/compose/).
## Directory Structure
```bash
├── app
│   ├── Console
│   ├── Constants
│   ├── DTOs
│   ├── Exception
│   ├── Http
│   ├── Models
│   ├── Providers
│   ├── Repositories
│   ├── Securities
│   ├── Services
│   └── Transformers
├── bootstrap
├── config
├── database
├── docker
├── lang
├── public
├── resources
├── routes
├── storage
├── tests
└── vendor
```
## Setup & start
#### 1. Setup Docker
The first, install **Docker** and **Docker Compose**:
- https://docs.docker.com/install/
- https://docs.docker.com/compose/install/
#### 2. Clone source code
Clone this project to your server or local machine.
```bash
git clone *
```
#### 3. Make config file
Run below command to make config file from sample file:
```bash
cp .env.example .env
```
#### 4. Build & start application
Run following command to build & start your application
```bash
docker-compose up -d
```
#### 5. Install packages
```bash
docker-compose exec php bash
composer install
```
## Executes tests
```bash
php artisan migrate:fresh --env=testing
php artisan test
```
## Test reports coverage
```bash
php artisan test --parallel --recreate-databases --coverage-html reports
or
./vendor/bin/phpunit --coverage-html test-reports
```
## Run phpcs and phpstan
```bash
composer phpcs
composer phpstan
```
## Documentation
```bash
php artisan l5-swagger:generate
```
API documentation with Swagger format is available here: [http://localhost:{$PORT}/api/documentation](http://localhost:808q/api/documentation)
## Telescope
Laravel Telescope is an elegant debug assistant: [http://localhost:{$PORT}/telescope](http://localhost:8001/telescope)
## Useful link
- laravel-modules https://github.com/nWidart/laravel-modules
- l5-swagger https://github.com/DarkaOnLine/L5-Swagger
- laravel-jwt https://github.com/PHP-Open-Source-Saver/jwt-auth
- telescope https://github.com/laravel/telescope
