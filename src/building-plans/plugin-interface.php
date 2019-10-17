<?php

namespace Awsm\WP_Plugin\Building_Plans;

/**
 * Interface Plugin_Interface
 *
 * @package SvenWagener\WP_Plugin
 *
 * @since 1.0.0
 */
interface Plugin_Interface {
	/**
	 * Returns plugin name.
	 *
	 * @return string Plugin name.
	 *
	 * @since 1.0.0
	 */
	public function get_name();

	/**
	 * Returns plugin slug.
	 *
	 * @return string Plugin slug.
	 *
	 * @since 1.0.0
	 */
	public function get_slug();

	/**
	 * Returns plugin version.
	 *
	 * @return string Plugin version.
	 *
	 * @since 1.0.0
	 */
	public function get_version();

	/**
	 * Runs the plugin.
	 *
	 * @return string Runs the plugin.
	 *
	 * @since 1.0.0
	 */
	public function run();
}
