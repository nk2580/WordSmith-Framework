<?php

namespace nk2580\wordsmith\Views;

use Philo\Blade\Blade as Blade;
use nk2580\wordsmith\Environment\Bootstrapper;

class View {

    public $blade;

    public function __construct() {
        $this->blade = new Blade(Bootstrapper::$VIEW_DIR, Bootstrapper::$CACHE_DIR);
    }

    public static function render($template, $data = array()) {
        $view = new self();
        echo $view->blade->view()->make($template, $data)->render();
    }

    public static function get($template, $data = array()) {
        $view = new self();
        return $view->blade->view()->make($template, $data)->render();
    }

    public static function exists($template) {
        $view = new self();
        return $view->blade->view()->exists($template);
    }

}