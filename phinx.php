<?php

# ex: PHINX_ENV_DEFAULT_DATABASE=production vendor/bin/phinx migrate

return [
    'paths' => [
        "migrations" => '%%PHINX_CONFIG_DIR%%/db/migrations',
        "seeds" => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => getenv("PHINX_ENV_DEFAULT_DATABASE") ?: 'development',

        'development' => [
            'adapter' => 'sqlite',
            'name' => 'sqlite',
        ],

    ],
    'version_order' => 'creation'
];
