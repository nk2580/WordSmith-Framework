<?php

/*
 * CRUCIBLE ENVIRONMENT AUTOLOADER
 * 
 * This file is designed to be used with the WordSmith Crucible framework.
 * 
 */

namespace nk2580\wordsmith\Environment;

use Philo\Blade\Blade as Blade;

class Bootstrapper {

    private $dir;
    public static $APP_DIR;
    public static $EXTENSIONS_DIR;
    public static $CONTROLLER_DIR;
    public static $VIEW_DIR;
    public static $CACHE_DIR;
    public static $BOWER_URI;
    public static $ASSET_DIR;
    private static $blade;

    public function __construct($dir) {
        $this->dir = $dir;
    }

    public static function init($dir) {
        $instance = new self($dir);
        $config = include $instance->dir . "/wordsmith.php";
        static::$APP_DIR = $instance->dir . $config["APP_DIR"];
        static::$CONTROLLER_DIR = $instance->dir . $config["CONTROLLER_DIR"];
        static::$EXTENSIONS_DIR = $instance->dir . $config["EXTENSIONS_DIR"];
        static::$VIEW_DIR = $instance->dir . $config["VIEW_DIR"];
        static::$CACHE_DIR = $instance->dir . $config["CACHE_DIR"];
        static::$BOWER_URI = $instance->dir . $config["BOWER_URI"];
        static::$ASSET_DIR = $instance->dir . $config["ASSET_DIR"];
        return $instance;
    }

    public static function boot() {
        self::loadDir(static::$EXTENSIONS_DIR);
        self::loadDir(static::$APP_DIR);
        self::loadDir(static::$CONTROLLER_DIR);
        return $this;
    }

    public static function ViewInstance() {
        static::$blade = new Blade(static::$VIEW_DIR, static::$CACHE_DIR);
        return static::$blade;
    }

    public static function loadDir($dir) {
        $ffs = scandir($dir);
        $i = 0;
        foreach ($ffs as $ff) {
            if ($ff != '.' && $ff != '..') {
                if (strlen($ff) >= 5) {
                    if (substr($ff, -4) == '.php') {
                        require_once $dir . '/' . $ff;
                    }
                }
                if (is_dir($dir . '/' . $ff))
                    self::loadDir($dir . '/' . $ff);
            }
        }
    }

}
