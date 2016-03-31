<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith\Routes;

use nk2580\wordsmith\Routes\RouteFactory;

/**
 * Description of Route
 *
 * @author Nik Kyriakidis
 */
class Route {

    protected $method;
    protected $uri;
    protected $group;
    protected $action;
    protected $parameters;

    public function __construct($method, $group, $uri, $action) {
        $this->method = $method;
        $this->uri = $uri;
        $this->group = $group;
        $this->action = $action;
    }

    public function getGroup() {
        return $this->group;
    }

    public function getURI() {
        return $this->uri;
    }

    public function getAction() {
        return $this->action;
    }

    public function getMethod() {
        return $this->method;
    }

    public static function get($group, $uri, $action) {
        $route = new self('GET', $group, $uri, $action);
        RouteFactory::addRoute($route);
    }

    public static function post($group, $uri, $action) {
        $route = new self('POST', $group, $uri, $action);
        RouteFactory::addRoute($route);
    }

    public function validateMethod() {
        return ($_SERVER['REQUEST_METHOD'] === $this->method);
    }

    public function invoke() {
          $parts = $pieces = explode("@", $this->action);
        /*
          $class = $parts[0];
          $method = $parts[1];
          $obj = new $class();
          $obj->$method();
         * 
         */
        print_r($parts);
    }

}
