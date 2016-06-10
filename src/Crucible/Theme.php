<?php

/*
 * CRUCIBLE ENVIRONMENT AUTOLOADER
 * 
 * This file is designed to be used with the WordSmith Crucible framework.
 * 
 */

namespace nk2580\wordsmith\Crucible;

class Theme {

    public $ROOT_URI;
    public $APP_DIR;
    public $BOWER_URI;
    public $EXTENSIONS_DIR;
    public $ASSET_DIR;
    public $CONTROLLER_DIR;
    public $VIEW_DIR;
    public $CACHE_DIR;

    public function __construct() {
        
        $this->ROOT_URI = get_template_directory_uri();
        $this->APP_DIR = __DIR__ . '/app';
        $this->BOWER_URI = get_template_directory_uri() . '/library/bower';
        $this->EXTENSIONS_DIR = __DIR__ . '/extensions';
        $this->ASSET_DIR = get_template_directory_uri() . '/assets';
        $this->CONTROLLER_DIR = __DIR__ . '/controllers';
        $this->VIEW_DIR = __DIR__ . '/views';
        $this->CACHE_DIR = __DIR__ . '/_cache';
        
    }

    private function loadDir($dir) {
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
                    $this->loadDir($dir . '/' . $ff);
            }
        }
    }

}
