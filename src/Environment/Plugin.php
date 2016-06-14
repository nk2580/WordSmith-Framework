<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith\Environment;

/**
 * Description of Plugin
 *
 * @author Nik Kyriakidis
 */
class Plugin {
    
    public static function init($dir, $uri) {
        Bootstrapper::init($dir, $uri);
        return Bootstrapper::boot();
    }

}
