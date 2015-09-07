<?php

/*
 * WORDSMITH ACTION CLASS
 * 
 * this class is the base object for a custom action to be added into wordpress.
 * it is a best prectise initiative that all actions to implement custom wordpress logic be enclosed in a single class which exnteds this class.
 */

namespace nk2580\wordsmith\Endpoints;

class Endpoint {

	protected $name;
	protected $url;
	protected $vars;
	protected $labels;

	public function __construct() {
		add_action( 'init', array( $this, 'create' ), 0 );
	}

	function create() {
		$this->args['labels'] = $this->labels;
		register_taxonomy( $this->name, $this->post_type, $this->args );
	}

}
