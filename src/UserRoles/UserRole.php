<?php

/*
 * WORDSMITH USER ROLE CLASS
 * 
 * this class is the base object for a custom action to be added into wordpress.
 * it is a best prectise initiative that all actions to implement custom wordpress logic be enclosed in a single class which exnteds this class.
 */

namespace nk2580\wordsmith\UserRoles;

class UserRole {

    public $role_name;
    public $display_name;
    public $capabilities = [];

    public function __construct() {
        $this->callAddRole($this->role_name, $this->display_name, $this->capabilities);
    }

    private function callAddRole($role_name, $display_name, $capabilities) {
        add_role( $role_name, $display_name, $capabilities );
    }

}
