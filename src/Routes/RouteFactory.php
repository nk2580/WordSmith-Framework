<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith\Routes;

/**
 * Description of RouteCollection
 *
 * @author Nik Kyriakidis
 */
class RouteFactory {

    public static function fetchGroup($group) {
        $status = false;
        $groups = self::routeGroups();
        if (!empty($groups)) {
            foreach ($groups as $g) {
                if ($g->name == $group) {
                    $status = $g;
                    break;
                }
            }
        }
        return $status;
    }

    public static function createGroup($group) {
        $obj = new RouteGroup($group);
        self::routeGroups()[$group] = $obj;
        return $obj;
    }

    public static function addRoute(Route $route) {
        $group = $route->getGroup();
        $RouteGroup = self::fetchGroup($group);
        if (!$RouteGroup) {
            $g = self::createGroup($group);
            $g->add($route);
        } else {
            $RouteGroup->add($route);
        }
    }

    public static function routeGroups() {
        global $_cc_routes;
        return $_cc_routes;
    }

}
