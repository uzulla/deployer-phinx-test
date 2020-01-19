<?php

require_once __DIR__."/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
    'paths' => [
        "migrations" => '%%PHINX_CONFIG_DIR%%/db/migrations',
        "seeds" => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => "your-db-name",

        'production' => [
            'adapter' => getenv("PHINX_ENV_PRODUCTION_ADAPTER"),
            'name' => getenv("PHINX_ENV_PRODUCTION_NAME"),
        ],

    ],
    'version_order' => 'creation'
];
