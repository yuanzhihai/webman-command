<?php
return [
    "paths"                => [
        "migrations" => "database/migrations",
        "seeds"      => "database/seeds"
    ],
    "environments"         => [
        "default_migration_table" => "phinx_log",
        "default_database"        => "dev",
        "default_environment"     => "dev",
        "dev"                     => [
            "adapter" => env('DB_CONNECTION', 'mysql'),
            "host"    => env('DB_HOST', '127.0.0.1'),
            "name"    => env('DB_DATABASE', 'forge'),
            "user"    => env('DB_USERNAME', 'forge'),
            "pass"    => env('DB_PASSWORD', ''),
            "port"    => env('DB_PORT', '3306'),
            "charset" => "utf8"
        ]
    ],
    "migration_base_class" => \yzh52521\command\commands\phinx\MigrationBaseClass::class,
    "seeder_base_class"    => \yzh52521\command\commands\phinx\SeederBaseClass::class
];
