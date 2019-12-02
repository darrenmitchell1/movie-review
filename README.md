# Movie Review

Laravel / Vue app to record and display reviews for movies.

## Prerequisite

[Composer](https://getcomposer.org/)

[Git](https://git-scm.com/)

[Database](https://laravel.com/docs/5.7/database)

## Development Environment

Build a tech stack that includes PHP >= 7.2 and a Database (MySQL)

Navigate to the dir that you want to create the project in and open a cli

## Clone Project

git clone https://github.com/darrenmitchell1/movie-review.git

navigate to the movie-review folder

## Install Composer Apps

composer install

## NPM

npm install

npm run dev

## Configuration

[Laravel 6 Installation Config](https://laravel.com/docs/6.x/installation#configuration)

### Application Key

If .env APP_KEY is not set exec the php command below

This will set the APP_KEY in the .env file.

php artisan key:generate

### Environment Config

[Laravel 6 Environment Config](https://laravel.com/docs/6.x/configuration#environment-configuration)

Add the Application details to the .env and save:

APP_NAME="Movie Review"

APP_ENV=local

NB. without trailing /

APP_URL=http://localhost | http://www.movie-review.com

if not using .env.example ensure the following are added:

MIX_APP_URL="${APP_URL}"

## Database Config

[Laravel 6 Database Config](https://laravel.com/docs/6.x/database#configuration)

### Create the database tables

php artisan migrate

### Seeding the database tables

php artisan db:seed --class=MoviesTableSeeder
