<?php
/**
 * Class for adding login styles.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Assets
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Assets;

/**
 * Class Login_Style.
 *
 * @since 1.0.0
 */
class Login_Style extends Style {

	/**
	 * Where should the assets be registered.
	 *
	 * @var string Hook to register
	 */
	protected $hook = 'login_enqueue_scripts';
}
