<?php

/*
 * WORDSMITH FILTER CLASS
 * 
 * this class is the base object for a filter to be added into wordpress.
 * 
 */

namespace nk2580\wordsmith\Filters;

class Filter {

    private $tag;
    private $callback;
    private $priority;
    private $args;

    public function __construct() {
         add_filter($this->tag, array($this, $this->callback), $this->priority, $this->args);
    }

}
