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
命令扫描

默认自动扫描 app\command 下的命令（同 webman/console 的逻辑）

### 配置命令

config/command.php

自定义命令

```
return [
     \App\Commands\MyCommand::class,
];


```

#使用

新建命令

```php
namespace app\command;

use Illuminate\Console\Command;

class Test extends Command
{
    protected $signature = 'test';

    protected $description = 'Test run command';

    public function handle(): void
    {
        $this->info("test!");
    }
}
```

调用 和laravel 使用一样
```
php artisan test 
```
业务中调用（比如控制器）

```php
use \yzh52521\command\facade\Artisan;
Artisan::call('test');
```

