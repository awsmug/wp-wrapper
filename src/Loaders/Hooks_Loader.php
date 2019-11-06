<?php

namespace Awsm\WP_Plugin\Loaders;

/**
 * Trait Assets_Loader.
 *
 * Loading assets if they are added.
 *
 * @since 1.0.0
 *
 * @package awsm\Tools
 */
trait Hooks_Loader {
	/**
	 * Loading Assets if functions where added.
	 *
	 * @since 1.0.0
	 */
	protected function load_hooks() {
		if ( method_exists( $this, 'add_actions' ) ) {
			$this->add_actions();
		}
		if ( method_exists( $this, 'add_filters' ) ) {
			$this->add_filters();
		}
	}
}