<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Laravel 5.4 starter kit

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

* Added config in webpack.mix.js to extract vue and axios.

### Redis

* Added predis to composer.json
* Set cache and session driver to redis in .env.example
* Setup a different redis connection for sessions so that when you call
artisan cache:clear it doesn't delete your session. See <a href="http://stackoverflow.com/a/38673140">this stack overflow answer</a> for details.

### Composer tasks

* Removed the post create project as this is meant to just be cloned, not create-projected.
* Added setup-local task
* Added setup-deps task
* Added deploy task mainly to show how to deploy.

### Deployer config

* Added a Deployer config in the "scripts" folder.

### Editorconfig file

Added simple editorconfig file with basic rules that are a good starting point
if you don't have specific code reformater like phpcs or standard configured.

### Standard

Reformated the basic app.js and bootsrap.js to follow the Javascript Standard Style, added standard to package.json
and configured it (in package.json) to accept global instances of Vue, JQuery and Lodash.

## How to use it

* Customize scripts/deploy.php with your server info, deploy_path and the command to reload php-fpm (to clear opcode caches).
* Remove everything above these ↓lines↓ and customize the rest for your project.

===============================================================

# Project name

## Setup the project locally

* Install Composer and Yarn globally on your system. Google it.
* Add "~/.composer/vendor/bin" or "~/.config/composer/vendor/bin" (find where it is via `composer global config --list | grep bin-dir`
) and "vendor/bin" to your $PATH.
* Install the Composer and Yarn dependencies via the setup-deps task:

```bash
composer setup-deps
```

* Create the .env and fill the key

```bash
composer setup-local
```

## Deploy

Theres a composer task named "deploy", but I suggest just entering the scripts dir and calling vendor/bin/dep inside.

```bash
cd scripts
dep deploy production
```

I suggest creating a 'deploy' user on the server and then giving him sudo access to reload php-fpm:

/etc/sudoers.d/deploy
```
deploy ALL=(ALL) NOPASSWD:/bin/systemctl reload php7.1-fpm.service
```
