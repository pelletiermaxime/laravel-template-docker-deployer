<?php
namespace Deployer;

require 'recipe/laravel.php';

/// Configuration
set('ssh_type', 'native');
set('ssh_multiplexing', false);

set('repository', 'git@domain.com:username/repository.git');

add('shared_files', []);
add('shared_dirs', []);

add('writable_dirs', []);
set('writable_use_sudo', false);

/// Servers
server('production', 'domain.com', 22)
    ->user('deploy')
    ->identityFile()
    ->set('deploy_path', '/var/www/domain.com')
    ->pty(true)
;

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


/// Main task. Mostly copied from laravel recipe with some added tasks.
desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:view:clear',
    'artisan:cache:clear',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:optimize',
    'artisan:migrate',
    'artisan:vendor:publish',
    'yarn-webpack',
    'deploy:symlink',
    'php-fpm:restart',
    'deploy:unlock',
    'cleanup',
    'success'
]);

after('deploy:failed', 'deploy:unlock');
