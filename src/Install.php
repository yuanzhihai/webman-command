<?php

namespace yzh52521\command;

class Install
{
    const WEBMAN_PLUGIN = true;

    /**
     * @var array
     */
    protected static $pathRelation = array(
        'config/plugin/yzh52521/command' => 'config/plugin/yzh52521/command',
    );

    /**
     * Install
     * @return void
     */
    public static function install()
    {
        copy(__DIR__ . "/artisan", base_path() . "/artisan");
        chmod(base_path() . "/artisan", 0755);
        copy(__DIR__ . '/config/command.php', config_path() . '/command.php');
        static::installByRelation();
    }

    /**
     * Uninstall
     * @return void
     */
    public static function uninstall()
    {
        if (is_file(base_path() . "/artisan")) {
            unlink(base_path() . "/artisan");
        }
        if (is_file(config_path() . "/command.php")) {
            unlink(config_path() . "/command.php");
        }
        self::uninstallByRelation();
    }

    /**
     * installByRelation
     * @return void
     */
    public static function installByRelation()
    {
        foreach (static::$pathRelation as $source => $dest) {
            if ($pos = strrpos($dest, '/')) {
                $parent_dir = base_path() . '/' . substr($dest, 0, $pos);
                if (!is_dir($parent_dir)) {
                    mkdir($parent_dir, 0777, true);
                }
            }
            copy_dir(__DIR__ . "/$source", base_path() . "/$dest");
        }
    }

    /**
     * uninstallByRelation
     * @return void
     */
    public static function uninstallByRelation()
    {
        foreach (static::$pathRelation as $source => $dest) {
            $path = base_path() . "/$dest";
            if (!is_dir($path) && !is_file($path)) {
                continue;
            }
            remove_dir($path);
        }
    }

}
