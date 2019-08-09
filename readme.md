
Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

Prerequisites
What things you need to install the software.

Git.
PHP.
Composer.
Laravel CLI.
A webserver like Nginx or Apache.
A Node Package Manager ( npm or yarn ).
Install

Then
copy the .env.example file to .env

$ cp .env.example .env

Generate the application key

$ php artisan key:generate

Add your database credentials to the necessary env fields

Migrate the application

$ php artisan migrate

Install laravel passport

$ php artisan passport:install

Seed Database

$ php artisan db:seed

Install node modules

$ npm install

Run the application
$ php artisan serve

Built With
Laravel - The PHP framework for building the application

Laravel - The excellent documentation explaining how to get started with Laravel and Laravel Permission Package made it easy to provide role management
