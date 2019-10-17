<?php

namespace Awsm\WP_Plugin\Tools;

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
	protected static function load_assets() {
		if ( method_exists( __CLASS__, 'enqueue_admin_scripts' ) ) {
			add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_scripts' ) );
		}
		if ( method_exists( __CLASS__, 'enqueue_admin_styles' ) ) {
			add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_styles' ) );
		}
		if ( method_exists( __CLASS__, 'enqueue_public_scripts' ) ) {
			add_action( 'wp_enqueue_scripts',  array( __CLASS__, 'enqueue_public_scripts' ) );
		}
		if ( method_exists( __CLASS__, 'enqueue_public_Styles' ) ) {
			add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_public_Styles' ) );
		}
	}
}