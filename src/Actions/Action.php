<?php

/*
 * WORDSMITH ACTION CLASS
 * 
 * this class is the base object for a custom action to be added into wordpress.
 * it is a best prectise initiative that all actions to implement custom wordpress logic be enclosed in a single class which exnteds this class.
 */

namespace WordSmith\Actions;

class Action {

	public $hook;
	public $callback;
	public $priority = 10;
	public $accepted_args = 1;

	public function __construct() {
		$this->callAddAction( $this->hook, $this->callback, $this->priority, $this->accepted_args );
	}

	private function callAddAction( $hook, $callback, $priority, $args ) {
		add_action( $hook, array( $this, $callback ), $priority = null, $args = null );
	}

}
