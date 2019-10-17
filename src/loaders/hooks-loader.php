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
	protected static function load_hooks() {
		if ( method_exists( __CLASS__, 'add_actions' ) ) {
			self::add_actions();
		}
		if ( method_exists( __CLASS__, 'add_filters' ) ) {
			self::add_filters();
		}
	}
}