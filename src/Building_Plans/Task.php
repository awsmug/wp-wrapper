<?php
/**
 * Task interface.
 *
 * @category Interface
 * @package  Awsm\WPWrapper\Building_Plans
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WPWrapper\Building_Plans;

/**
 * Task Plugin_Interface
 *
 * @package Awsm\WPWrapper\Building_Plans
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
