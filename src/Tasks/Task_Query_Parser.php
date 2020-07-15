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
	 * Parameter identifier for this task.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private $task_parameter_prefix = '';

	/**
	 * Values of query.
	 *
	 * @var array
	 *
	 * @since 1.0.0
	 */
	private $values = array();

	/**
	 * Set Query.
	 *
	 * @param array $query Data from $_GET, $_POST or $_REQUEST variable.
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 */
	public function set_query( array $query ) {
		return $this->parse_task_query( $query );
	}

	/**
	 * Returns a array with all parsed query arguments.
	 *
	 * @return array Query values for task.
	 *
	 * @since 1.0.0
	 */
	public function get_query_values(): array {
		return $this->values;
	}

	/**
	 * Checks if query has values.
	 *
	 * @return bool True if it has values for task, false if not.
	 *
	 * @since 1.0.0
	 */
	public function has_query_values() {
		if( is_array( $this->values ) && count( $this->values ) > 0 ) {
			return true;
		}

		return false;
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
	 * Parse query for variables.
	 *
	 * @param array $query Data from $_GET, $_POST or $_REQUEST variable.
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 */
	private function parse_task_query( array $query ): bool {
		$values = array();

		if ( empty( $query ) ) {
			return false;
		}

		foreach ( array_keys( $query ) as $parameter ) {
			$is_valid_argument = strpos( $parameter, $this->get_task_parameter_prefix() );

			if ( $is_valid_argument === false ) {
				continue;
			}

			$parameter_new_key            = str_replace( $this->get_task_parameter_prefix() . '_', '', $parameter );
			$values[ $parameter_new_key ] = $query[ $parameter ];
		};

		$this->values = $values;

		return true;
	}
}

