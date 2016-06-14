<?php

namespace nk2580\wordsmith\Views;

use duncan3dc\Laravel\BladeInstance;
use nk2580\wordsmith\Environment;

class View {

    public static function render($template, $data = array()) {
        $blade = new BladeInstance(Environment, "././_cache");
        echo $blade->render($template, $data);
    }

    public static function get($template, $data = array()) {
        $blade = new BladeInstance(Environment, "././_cache");
        return $blade->render($template, $data);
    }

    public static function exists($template) {
        $blade = new BladeInstance(Environment, "././_cache");
        return $blade->exists($template);
    }

}
