<?php

namespace nk2580\wordsmith\Utillities;

abstract class View {

    private $twig;

    public function __construct() {
        $loader = new Twig_Loader_Filesystem([ADMIN_VIEWS_PATH, PUBLIC_VIEWS_PATH]);
        $this->twig = new Twig_Environment($loader);
    }

    public function render($template, $data) {
        echo $this->twig->render($template, $data);
    }

    public function get($template, $data) {
        return $this->twig->render($template, $data);
    }

    public static function make($template, $data) {
        $view = new self();
        $view->show($template, $data);
    }

}
