<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith;

use Dotenv\Dotenv;

/**
 * Description of Environment
 *
 * @author Nik Kyriakidis
 */
class Environment {

    public static function boot($dir) {
        $dotenv = new Dotenv($dir);
        $dotenv->load();
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
