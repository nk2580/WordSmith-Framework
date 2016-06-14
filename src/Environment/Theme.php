<?php

/*
 * CRUCIBLE ENVIRONMENT AUTOLOADER
 * 
 * This file is designed to be used with the WordSmith Crucible framework.
 * 
 */

namespace nk2580\wordsmith\Environment;

class Theme {

    public static function init() {
        Bootstrapper::init(__DIR__, get_template_directory_uri());
        Bootstrapper::boot();
    }

}