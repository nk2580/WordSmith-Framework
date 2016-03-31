<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith\Routes;

use nk2580\wordsmith\Routes\RouteCollection;
use nk2580\wordsmith\Routes\Route;

/**
 * Description of RouteGroup
 *
 * @author Nik Kyriakidis
 */
class RouteGroup {

    protected $routes = [];
    public $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function add(Route $route){
        $this->routes[] = $route;
    }
    
    public function routes(){
        return $this->routes;
    }

}
