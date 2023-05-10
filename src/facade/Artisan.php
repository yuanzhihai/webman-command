<?php

namespace yzh52521\command\facade;

use support\Container;
use yzh52521\command\Kernel;

/**
 * @method static int call( string $command,array $parameters = [],$outputBuffer = null )
 * @method static string output()
 */
class Artisan
{
    /**
     * @var null|Kernel
     */
    protected static $_instance = null;

    public static function instance(): Kernel
    {
        if (!static::$_instance) {
            static::$_instance = Container::make( Kernel::class,[] );
        }
        return static::$_instance;
    }

    public static function __callStatic($name,$arguments)
    {
        return static::instance()->{$name}( ...$arguments );
    }
}