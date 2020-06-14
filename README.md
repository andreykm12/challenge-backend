
# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start.

Clone the repository

    git clone https://github.com/andreykm12/challenge-backend.git

Switch to the repo folder

    cd challenge-backend

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database test seeds

    php artisan db:seed

## Unit test

Set the database connection in .env.testing before migrating

Run tests

    phpunit
