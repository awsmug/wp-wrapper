<?php

namespace Awsm\WP_Plugin\Building_Plans;

/**
 * Interface Plugin_Interface
 *
 * @package SvenWagener\WP_Plugin
 *
 * @since 1.0.0
 */
interface Plugin {
	/**
	 * Returns plugin name.
	 *
	 * @return string Plugin name.
	 *
	 * @since 1.0.0
	 */
	public function get_name();

	/**
	 * Returns plugin version.
	 *
	 * @return string Plugin version.
	 *
	 * @since 1.0.0
	 */
	public function get_version();

	/**
	 * Boots the plugin.
	 *
	 * @return string Boots the plugin.
	 *
	 * @since 1.0.0
	 */
	public function boot();
}
