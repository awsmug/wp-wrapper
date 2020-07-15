<?php
/**
 * Trait for parsing query arguments for tasks.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Tasks
 * @author   Rene Reimann
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Tasks;

use Awsm\WP_Wrapper\Exceptions\Exception;

/**
 * Trait Task_Query_Parser.
 *
 * @since 1.0.0
 */
trait Task_Query_Parser {
	/**
	 * Tasks.
	 *
	 * @since 1.0.0
	 *
	 * @var array $services Registered services.
	 */
	protected $tasks = array();

	/**
	 * Parameter identifier for this task.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private $task_parameter_prefix = '';

	/**
	 * Returns a array with all parsed query arguments.
	 *
	 * @param array $data Data from $_GET, $_POST or $_REQUEST variable.
	 *
	 * @return array Query values for task.
	 *
	 * @since 1.0.0
	 */
	public function get_query_values( array $data ): array {
		return $this->parse_task_query( $data );
	}

	/**
	 * Set query prefix for a task.
	 *
	 * @param string $name Task query prefix.
	 *
	 * @since 1.0.0
	 */
	public function set_task_parameter_prefix( string $name ) {
		$this->task_parameter_prefix = $name;
	}

	/**
	 * Retrieve query prefix string.
	 *
	 * @return string Task query prefix.
	 *
	 * @since 1.0.0
	 */
	public function get_task_parameter_prefix() {
		return $this->task_parameter_prefix;
	}

	/**
	 * Filter an array for arguments by task_parameter_prefix
	 *
	 * @param array $arguments
	 *
	 * @return array
	 *
	 * @since 1.0.0
	 */
	private function parse_task_query( array $arguments ): array {
		$parsed_arguments = array();

		if ( empty( $arguments ) ) {
			return $parsed_arguments;
		}

		foreach ( array_keys( $arguments ) as $argument ) {
			$is_valid_argument = strpos( $argument, $this->get_task_parameter_prefix() );

			if ( $is_valid_argument === false ) {
				continue;
			}

			$argument_new_key                      = str_replace( $this->get_task_parameter_prefix() . '_', '', $argument );
			$parsed_arguments[ $argument_new_key ] = $arguments[ $argument ];
		};

		return $parsed_arguments;
	}

}

