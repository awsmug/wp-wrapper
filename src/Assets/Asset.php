<?php

namespace Awsm\WPWrapper\Assets;

/**
 * Class Asset.
 *
 * @since 1.0.0
 *
 * @package Awsm\WPWrapper\Assets
 */
abstract class Asset {

	/**
	 * Handle name.
	 *
	 * @since 1.0.0
	 *
	 * @var string Name of the handle. Should be unique.
	 */
	protected $handle;

	/**
	 * Source file.
	 *
	 * @since 1.0.0
	 *
	 * @var string Full URL of the script.
	 */
	protected $source;

	/**
	 * Dependencies.
	 *
	 * @since 1.0.0
	 *
	 * @var array An array of registered stylesheet handles this stylesheet depends on.
	 */
	protected $dependencies = array();

	/**
	 * Version.
	 *
	 * @since 1.0.0
	 *
	 * @var string String specifying stylesheet version number.
	 */
	protected $version;

	/**
	 * Hook.
	 *
	 * @since 1.0.0
	 *
	 * @var string Hook name where scripts will be loaded.
	 */
	protected $hook;

	/**
	 * Asset constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param string $handle       Name of the handle. Should be unique.
	 * @param string $source       Full URL of the script.
	 * @param array  $dependencies An array of registered stylesheet handles this stylesheet depends on.
	 * @param string $version      String specifying stylesheet version number.
	 */
	public function __construct( string $handle, string $source, array $dependencies = array(), string $version ) {
		$this->handle = $handle;
		$this->source = $source;
		$this->dependencies = $dependencies;
		$this->version = $version;

		$this->register();
	}

	/**
	 * Register scripts.
	 *
	 * @return mixed
	 */
	abstract function register();

	/**
	 * Enqueue scripts.
	 *
	 * @return mixed
	 */
	abstract function enqueue();
}
