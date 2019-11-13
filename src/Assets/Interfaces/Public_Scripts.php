<?php

namespace Awsm\WP_Plugin\Services;

/**
 * Interface Assets_Admin_Interface.
 *
 * @package SvenWagener\WP_Plugin
 *
 * @since 1.0.0
 */
interface Public_Scripts {
	/**
	 * Adding admin scripts.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_public_scripts();
}
