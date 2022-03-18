## 基于laravel webman 命令行插件
### 安装

```
composer require yzh52521/webman-command
```
> 插件依赖

```
workerman/webman-framework
symfony/console
illuminate/console
robmorgan/phinx
illuminate/database
illuminate/events
```
### 配置命令

config/command.php


```
return [
   
   //数据迁移
    yzh52521\command\commands\phinx\Create::class,
    yzh52521\command\commands\phinx\Migrate::class,
    yzh52521\command\commands\phinx\Rollback::class,
    yzh52521\command\commands\phinx\Breakpoint::class,
    yzh52521\command\commands\phinx\ListAliases::class,
    yzh52521\command\commands\phinx\SeedCreate::class,
    yzh52521\command\commands\phinx\SeedRun::class,
    yzh52521\command\commands\phinx\Status::class,
    yzh52521\command\commands\phinx\Test::class,
    
    //测试脚本
    yzh52521\command\commands\Test::class,
];

```

迁移插件配置
config/phinx.php
```
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


```

#使用

和laravel 使用一样
```
php artisan command(命令) 
```

