<?php
/**
 * Logger.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Tools;
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Tools;

use DateTimeZone;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\StreamHandler;

/**
 * Logger Wrapper.
 *
 * @since 1.0.0
 */
class Logger extends \Monolog\Logger {

	/**
	 * Constructor.
	 *
	 * @param string             $name       The logging channel, a simple descriptive name that is attached to all log records
	 * @param HandlerInterface[] $handlers   Optional stack of handlers, the first one in the array is called first, etc.
	 * @param callable[]         $processors Optional array of processors
	 * @param DateTimeZone|null  $timezone   Optional timezone, if not provided date_default_timezone_get() will be used
	 */
	public function __construct( string $name, array $handlers = [], array $processors = [], DateTimeZone $timezone = null ) {
		parent::__construct($name, $handlers, $processors, $timezone);

		$file = $this->get_logging_path() . '/' . $this->get_logging_filename();
		$this->pushHandler( new StreamHandler( $file, $this->get_debug_level() ) );
	}

	/**
	 * Get logging path.
	 *
	 * Should be overwritten by child classes to change logging path.
	 *
	 * @return string Logging path.
	 */
	protected function get_logging_path() {
		return defined( 'WP_LOG_DIR' ) ? WP_LOG_DIR : dirname( ABSPATH );
	}

	/**
	 * Get logging filename.
	 *
	 * Should be overwritten by child classes to change logging filename.
	 *
	 * @return string Logging filename.
	 */
	protected function get_logging_filename() {
		return $this->getName() . '.log';
	}

	/**
	 * Get debug level.
	 *
	 * Should be overwritten by child classes to change debug level.
	 *
	 * @return string Logging filename.
	 */
	protected function get_debug_level() {
		return Logger::WARNING;
	}
}
