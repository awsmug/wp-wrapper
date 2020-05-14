<?php
/**
 * Abstract class for use in assets.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Assets
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Assets;

/**
 * Class Asset.
 *
 * @since 1.0.0
 *
 * @package Awsm\WP_Wrapper\Assets
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
		$this->handle       = $handle;
		$this->source       = $source;
		$this->dependencies = $dependencies;
		$this->version      = $version;
	}

	/**
	 * Register scripts.
	 *
	 * @return mixed
	 */
	abstract public function register();

	/**
	 * Enqueue scripts.
	 *
	 * @return mixed
	 */
	public function enqueue() {
		$this->register();
	}
}
