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
trait Loader {
	/**
	 * Loading Assets if functions where added.
	 *
	 * @since 1.0.0
	 */
	public function load() {
		if ( method_exists( $this, 'load_assets' ) ) {
			$this->load_assets();
		}
		if ( method_exists( $this, 'load_hooks' ) ) {
			$this->load_hooks();
		}
	}
}