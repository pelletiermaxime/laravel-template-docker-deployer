<?php
namespace Deployer;

require 'custom-tasks.php';
require 'database-sync.php';
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
    // 'php-fpm:restart',
    'opcache:clear',
    'opcache:optimize',
    'deploy:unlock',
    'cleanup',
    'success'
]);

after('deploy:failed', 'deploy:unlock');
