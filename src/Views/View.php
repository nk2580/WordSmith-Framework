<?php

namespace nk2580\wordsmith\Views;

use Philo\Blade\Blade as Blade;

abstract class View {

    private $blade;

    public function __construct() {
        $this->blade = new Blade(CRUCIBLE_VIEW_DIR, CRUCIBLE_CACHE_DIR);
    }

    public function render($template, $data) {
        echo $this->blade->view()->make($template,$data)->render();
    }

    public function get($template, $data) {
        return $this->blade->view()->make($template,$data)->render();
    }

}
