<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith;

use Dotenv\Dotenv;

/**
 * Description of Environment
 *
 * @author Nik Kyriakidis
 */
class Environment {

    public static function boot($dir) {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
    }

}
