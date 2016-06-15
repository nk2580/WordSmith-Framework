<?php

/*
 * CRUCIBLE ENVIRONMENT AUTOLOADER
 * 
 * This file is designed to be used with the WordSmith Crucible framework.
 * 
 */

namespace nk2580\wordsmith\Environment;

use Dotenv\Dotenv;
use Philo\Blade\Blade as Blade;

class Bootstrapper {

    public static $APP_DIR;
    public static $EXTENSIONS_DIR;
    public static $CONTROLLER_DIR;
    public static $VIEW_DIR;
    public static $CACHE_DIR;
    public static $BOWER_URI;
    public static $ASSET_DIR;
    private static $blade;

    public static function init($dir, $uri) {
        $dotenv = new Dotenv($dir);
        $dotenv->load();
        static::$APP_DIR = $dir . getenv("APP_DIR");
        static::$CONTROLLER_DIR = $dir . getenv("CONTROLLER_DIR");
        static::$EXTENSIONS_DIR = $dir . getenv("EXTENSIONS_DIR");
        static::$VIEW_DIR = $dir . getenv("VIEW_DIR");
        static::$CACHE_DIR = $dir . getenv("CACHE_DIR");
        static::$BOWER_URI = $uri . getenv("BOWER_URI");
        static::$ASSET_DIR = $uri . getenv("ASSET_DIR");
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
