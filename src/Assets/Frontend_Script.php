<?php
/**
 * Class for adding frontend scripts.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Assets
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Assets;

/**
 * Class Frontend_Script.
 *
 * @since 1.0.0
 */
class Frontend_Script extends Script {

	/**
	 * Where should the assets be registered.
	 *
	 * @var string Hook to register
	 */
	protected $hook = 'wp_enqueue_scripts';
}
