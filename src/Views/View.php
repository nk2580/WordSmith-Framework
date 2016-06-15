<?php

namespace nk2580\wordsmith\Views;

use nk2580\wordsmith\Environment\Bootstrapper;

class View {

    public static function render($template, $data = array()) {
        $blade = Bootstrapper::ViewInstance();
        echo $blade->view()->make($template, $data)->render();
    }

    public static function get($template, $data = array()) {
        $blade = Bootstrapper::ViewInstance();
        return $blade->view()->make($template, $data)->render();
    }

    public static function exists($template) {
        $blade = Bootstrapper::ViewInstance();
        return $blade->view()->exists($template);
    }

}
