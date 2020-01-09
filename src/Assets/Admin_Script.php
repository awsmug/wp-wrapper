<?php
/**
 * Class for adding admin scripts.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Assets
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Assets;

/**
 * Class Admin_Script.
 *
 * @since 1.0.0
 */
class Admin_Script extends Script {

	/**
	 * Where should the assets be registered.
	 *
	 * @since 1.0.0
	 *
	 * @var string Hook to register
	 */
	protected $hook = 'admin_enqueue_scripts';
}
