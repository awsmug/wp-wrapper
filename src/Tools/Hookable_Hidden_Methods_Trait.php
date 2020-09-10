<?php

namespace Awsm\WP_Wrapper\Tools;

/**
 * Trait Hookable_Hidden_Methods.
 *
 * This design approach lets set functions to private which have to be hooked into wordpress,
 * which has inheritance reasons. Not all child classes should have access to hooked functions.
 *
 * @package Awsm\WP_Wrapper\Traits
 *
 * @since 1.0.0
 */
trait Hookable_Hidden_Methods_Trait {
	/**
	 * Hookable hidden methods.
	 *
	 * @var array
	 *
	 * since 1.0.0
	 */
	private $hookable_hidden_methods;

	/**
	 * Set hookable hidden methods.
	 *
	 * @param array $functions
	 *
	 * @since 1.0.0
	 */
	protected function set_hookable_hidden_methods( array $functions  ) {
		$this->hookable_hidden_methods = $functions;
	}

	/**
	 * Magic call method.
	 *
	 * @param $name
	 * @param $arguments
	 *
	 * @return mixed
	 *
	 * @since 1.0.0
	 */
	public function __call( $name, $arguments ) {
		if( ! in_array( $name, $this->hookable_hidden_methods ) ) {
			return;
		}

		return call_user_func_array( [ $this, $name ], $arguments  );
	}
}
