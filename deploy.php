<?php

namespace Deployer;

require_once __DIR__ . "/vendor/autoload.php";

require 'recipe/common.php';
require 'recipe/phinx.php';

inventory('production.hosts.yml');

// Project name
set('application', 'deployer-phinx-test');

// Project repository
set('repository', 'git@github.com:uzulla/deployer-phinx-test.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys 
set('shared_files', ['database.sqlite3']);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);
set('allow_anonymous_stats', false);

set('phinx', [
    'environment' => 'production',
    'configuration' => 'phinx.php',
    'remove-all' => '' // とりあえずBreakpointはなしで…
]);

set('phinx_path', 'vendor/bin/phinx');

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

task('test', function () {
    writeln('Hello world');
});

// db migration
after('cleanup', 'phinx:migrate');

// upload config
before('deploy:shared', 'upload-env');
task('upload-env', function () {
    $stage = get('stage');
    upload(__DIR__ . "/{$stage}.env", "{{release_path}}/.env");
    upload(__DIR__ . "/{$stage}.phinx.php", "{{release_path}}/phinx.php");
});

// // [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
