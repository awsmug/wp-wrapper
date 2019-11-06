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
trait Assets_Loader {
	/**
	 * Loading Assets if functions where added.
	 *
	 * @since 1.0.0
	 */
	protected function load_assets() {
		if ( method_exists( $this, 'enqueue_admin_scripts' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		}
		if ( method_exists( $this, 'enqueue_admin_styles' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		}
		if ( method_exists( $this, 'enqueue_public_scripts' ) ) {
			add_action( 'wp_enqueue_scripts',  array( $this, 'enqueue_public_scripts' ) );
		}
		if ( method_exists( $this, 'enqueue_public_Styles' ) ) {
			add_action( 'wp_enqueue_scripts', array( $thiss, 'enqueue_public_Styles' ) );
		}
	}
}