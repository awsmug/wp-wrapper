<?php
/**
 * Trait with logger functions.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Traits
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Tools;

/**
 * Trait Logger.
 *
 * @since 1.0.0
 *
 * @package Awsm\WP_Wrapper\Traits
 */
trait Logger_Trait {
	/**
	 * Logger object.
	 *
	 * @since 1.0.0
	 *
	 * @var \Awsm\WP_Wrapper\Tools\Logger
	 */
	protected $logger;

	/**
	 * Logger fuunction.
	 *
	 * @since 1.0.0
	 *
	 * @return \Awsm\WP_Wrapper\Tools\Logger
	 */
	protected function logger() {
		return $this->logger;
	}
}
