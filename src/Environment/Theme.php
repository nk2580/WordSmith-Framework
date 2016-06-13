<?php

/*
 * CRUCIBLE ENVIRONMENT AUTOLOADER
 * 
 * This file is designed to be used with the WordSmith Crucible framework.
 * 
 */

namespace nk2580\wordsmith\Crucible;

class Theme extends Autoloader {

    public $ROOT_URI;
    public $BOWER_URI;
    public $ASSET_URI;

    public function __construct() {

        $this->ROOT_URI = get_template_directory_uri();
        $this->BOWER_URI = get_template_directory_uri() . '/library/bower';
        $this->ASSET_DIR = get_template_directory_uri() . '/assets';
    }

    public function loadDir($dir) {
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
