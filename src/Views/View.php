<?php

namespace nk2580\wordsmith\Views;

use Philo\Blade\Blade as Blade;

class View {

    private $blade;

    public function __construct() {
        $this->blade = new Blade(CRUCIBLE_VIEW_DIR, CRUCIBLE_CACHE_DIR);
    }

    public function render($template, $data=array()) {
        echo $this->blade->view()->make($template,$data)->render();
    }

    public function get($template, $data=array()) {
        return $this->blade->view()->make($template,$data)->render();
    }

}
