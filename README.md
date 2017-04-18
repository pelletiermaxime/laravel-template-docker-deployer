<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Laravel starter kit

## Why ?

There are several configs and details I do every time I start a Laravel project, either for a really small toy project
or a big project at work. This is a very opinionated starting point for new Laravel projects. In the future I may add
a system to ask questions and let you customize some stuff based on your preferences.

## What does it do and add ?

### Gitignore:

* Ignore all assets in public
* Ignore everything in storage instead of adding 6 different .gitignore files
* Remove editor/vagrant/Homestead stuff. Imo all those should be in your global gitignore file. Nobody cares that you use PhpStorm.

### Laravel Mix

* Add config in webpack.mix.js to extract vue and axios.

### Redis

* Add predis to composer.json
* Set cache and session driver to redis in .env.example
* Setup a different redis connection for sessions so that when you call
artisan cache:clear it doesn't delete your session. See <a href="http://stackoverflow.com/a/38673140">this stack overflow answer</a> for details.

## How to use it

* Remove everything above these ↓lines↓ and customize the rest for your project.

===============================================================

# Project name

## Setup the project locally

* Install Composer and Yarn globally on your system. Google it.
* Install the Composer and Yarn dependencies

```bash
composer install
yarn
```