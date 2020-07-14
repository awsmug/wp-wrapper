<?php
/**
 * Task interface.
 *
 * @category Interface
 * @package  Awsm\WP_Wrapper\Interfaces
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Interfaces;

/**
 * Task Plugin_Interface
 *
 * @package Awsm\WP_Wrapper\Interfaces
 *
 * @since 1.0.0
 */
interface Task {
	/**
	 * Register function which executes scripts.
	 *
	 * @since 1.0.0
	 *
	 * @return mixed
	 */
	public function run();
}
