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
	protected static function load() {
		if ( method_exists( __CLASS__, 'load_assets' ) ) {
			self::load_assets();
		}
		if ( method_exists( __CLASS__, 'load_hooks' ) ) {
			self::load_hooks();
		}
	}
}