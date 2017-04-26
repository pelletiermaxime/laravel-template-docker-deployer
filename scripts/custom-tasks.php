<?php
namespace Deployer;

/// Custom Tasks
task('php-fpm:restart', function () {
    // The deploy user must have rights for restart service. See doc.
    // run('sudo service php5-fpm reload');
    // run('sudo /bin/systemctl reload php-fpm.service');
    // run('sudo /bin/systemctl reload php7.1-fpm.service');
})->desc('Restart PHP-FPM service');

task('yarn-webpack', function () {
    cd('{{release_path}}');
    run('yarn');
    run('yarn run production');
})->desc('Install yarn deps and run laravel mix');

task('artisan:vendor:publish', function () {
    run('{{bin/php}} {{release_path}}/artisan vendor:publish');
})->desc('Execute artisan vendor:publish');

task('artisan:key:generate', function () {
    run('{{bin/php}} {{release_path}}/artisan key:generate');
})->desc('Execute artisan key:generate');

task('artisan:opcache:clear', function () {
    run('{{bin/php}} {{release_path}}/artisan opcache:clear');
})->desc('Execute artisan opcache:clear');

task('artisan:opcache:optimize', function () {
    run('{{bin/php}} {{release_path}}/artisan opcache:optimize');
})->desc('Execute artisan opcache:optimize');
