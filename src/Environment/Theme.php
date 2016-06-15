<?php

/*
 * CRUCIBLE ENVIRONMENT AUTOLOADER
 * 
 * This file is designed to be used with the WordSmith Crucible framework.
 * 
 */

namespace nk2580\wordsmith\Environment;

class Theme extends Instance {

    public static function init() {
        Bootstrapper::init(get_template_directory(), get_template_directory_uri());
        Bootstrapper::boot();
    }

}