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
	 * @var array $services Registered services
	 */
	protected $tasks = [];

	private $task_query_prefix = '';

	public function get_parsed_task_queries(array $arguments):array {
		return $this->parse_task_queries($arguments);
	}

	public function set_task_query_prefix(string $name){
		$this->task_query_prefix = $name;
	}

	public function get_task_query_prefix(){
		return $this->task_query_prefix;
	}


	/**
	 * Filter a array for arguments by task_query_prefix
	 *
	 * @param array $arguments
	 * @return array
	 */
	private function parse_task_queries(array $arguments):array {
		$parsed_arguments = [];

		if(empty($arguments)){
			return $parsed_arguments;
		}

		foreach(array_keys($arguments) as $argument){
			$is_valid_argument = strpos($argument, $this->get_task_query_prefix());

			if($is_valid_argument === false){
				continue;
			}

			$argument_new_key = str_replace($this->get_task_query_prefix() . '_', '', $argument);
			$parsed_arguments[$argument_new_key] = $arguments[$argument];
		};

		return $parsed_arguments;
	}

}

