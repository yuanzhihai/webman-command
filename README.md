## 基于laravel webman 命令行插件
### 安装

```
composer require yzh52521/webman-command
```
> 插件依赖

```
workerman/webman-framework
illuminate/console
illuminate/database
illuminate/events
```
### 配置命令

config/command.php


```
return [
    //测试脚本
    yzh52521\command\commands\Test::class,
];


```

#使用

和laravel 使用一样
```
php artisan command(命令) 
```

