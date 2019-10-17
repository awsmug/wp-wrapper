<?php

namespace Awsm\WP_Plugin\Building_Plans;

/**
 * Interface Assets_Admin_Interface.
 *
 * @package SvenWagener\WP_Plugin
 *
 * @since 1.0.0
 */
interface Assets_Admin_Interface {
	/**
	 * Adding admin scripts.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_admin_scripts();
}
