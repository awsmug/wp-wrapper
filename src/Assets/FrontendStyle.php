<?php

namespace Awsm\WPWrapper\Assets;

class FrontendStyle extends Style {

	/**
	 * Where should the assets be registered.
	 *
	 * @var string Hook to register
	 */
	protected $hook = 'wp_enqueue_scripts';
}
