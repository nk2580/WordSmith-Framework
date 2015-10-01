<?php

/*
 * WORDSMITH CAPABILITY CLASS
 * 
 * this class is the base object for a custom action to be added into wordpress.
 * it is a best prectise initiative that all actions to implement custom wordpress logic be enclosed in a single class which exnteds this class.
 */

namespace nk2580\wordsmith\UserCapabilities;

class UserCapability {

    public $role_name;
    public $cap_name;

    public function __construct() {
        $role = get_role( $this->role_name );
        $role->add_cap( $this->cap_name );
    }
}
