<?php
/**
 * Abstract class for adding scripts.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Assets
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Assets;

use Awsm\WP_Wrapper\Interfaces\Actions;

/**
 * Class Script
 *
 * @since 1.0.0
 *
 * @package Awsm\WP_Wrapper\Assets
 */
abstract class Script extends Asset implements Actions {

	/**
	 * In footer.
	 *
	 * @since 1.0.0
	 *
	 * @var bool|bool
	 */
	protected $in_footer = false;

	/**
	 * Priotity of hooking.
	 * 
	 * @since 1.0.0
	 * 
	 * @var int
	 */
	protected $priority;

	/**
	 * Script constructor.
	 *
	 * @param string $handle       Name of the handle. Should be unique.
	 * @param string $source       Full URL of the script.
	 * @param array  $dependencies An array of registered stylesheet handles this stylesheet depends on.
	 * @param string $version      String specifying stylesheet version number.
	 * @param bool   $in_footer    Whether to enqueue the script before </body> instead of in the <head>. Default 'false'.
	 * @param int    $priority     Priority of the in the hook list.
	 */
	public function __construct( string $handle, string $source, array $dependencies = array(), string $version, bool $in_footer, $priority = 10 ) {
		$this->in_footer = $in_footer;
		$this->priority  = $priority;

		$this->add_actions();

		parent::__construct( $handle, $source, $dependencies, $version );
	}

	/**
	 * Adding actions.
	 *
	 * @since 1.0.0
	 */
	public function add_actions() {
		\add_action( $this->hook, array( $this, 'enqueue' ), $this->priority );
	}

	/**
	 * Enqueuing script.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		\wp_enqueue_script( $this->handle, $this->source, $this->dependencies, $this->version, $this->in_footer );
	}
}
