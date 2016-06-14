<?php

namespace nk2580\wordsmith\Views;

use duncan3dc\Laravel\BladeInstance;
use nk2580\wordsmith\Framework;


class View {
    
    
    private static function init(){
        return new BladeInstance(Framework::$viewdir, Framework::$cacheDir);
    }

    public static function render($template, $data = array()) {
        //$blade = self::init();
        //echo $blade->render($template, $data);
        echo Framework::$viewdir;
    }

    public static function get($template, $data = array()) {
        $blade = self::init();
        return $blade->render($template, $data);
    }

    public static function exists($template) {
        $blade = self::init();
        return $blade->exists($template);
    }

}
