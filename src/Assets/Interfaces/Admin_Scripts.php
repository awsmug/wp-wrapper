<?php

namespace Awsm\WP_Plugin\Services;

/**
 * Interface Assets_Admin_Interface.
 *
 * @package SvenWagener\WP_Plugin
 *
 * @since 1.0.0
 */
interface Admin_Scripts {
	/**
	 * Adding admin scripts.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_admin_scripts();
}
