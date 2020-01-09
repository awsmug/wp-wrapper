<?php

namespace Awsm\WPWrapper\Assets;

class EditorScript extends Script {

	/**
	 * Where should the assets be registered.
	 *
	 * @var string Hook to register
	 */
	protected $hook = 'enqueue_block_editor_assets';
}
