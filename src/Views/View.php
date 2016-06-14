<?php

namespace nk2580\wordsmith\Views;

use duncan3dc\Laravel\Blade;

class View {
    
    public static function setupPaths(){
        $paths = $GLOBALS['wordsmith_view_dirs'];
        foreach($paths as $path){
            Blade::addPath($path);
        }
    }

    public static function render($template, $data = array()) {
        self::setupPaths();
        echo Blade::render($template, $data);
    }

    public static function get($template, $data = array()) {
        self::setupPaths();
        return Blade::render($template, $data);
    }

    public static function exists($template) {
        self::setupPaths();
        return Blade::exists($template);
    }

}
