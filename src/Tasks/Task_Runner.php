<?php
/**
 * Trait for running tasks.
 *
 * @category Class
 * @package  Awsm\WP_Wrapper\Tasks
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Tasks;

use Awsm\WP_Wrapper\Exceptions\Exception;

/**
 * Trait Task_Runner.
 *
 * @since 1.0.0
 */
trait Task_Runner {
	/**
	 * Tasks.
	 *
	 * @since 1.0.0
	 *
	 * @var array $services Registered services
	 */
	protected $tasks = array();

	/**
	 * Add Task.
	 *
	 * @since 1.0.0
	 *
	 * @param string $class Class name.
	 * @param array  ...$params Parameters to put in constructor.
	 *
	 * @return object $this Current object.
	 */
	public function add_task( $class, ...$params ) {
		$this->tasks[] = array( $class, $params );

		return $this;
	}


	/**
	 * Get the list of services to register.
	 *
	 * @since 1.0.0
	 *
	 * @return Task[] Array of fully qualified class names.
	 */
	public function get_tasks() {
		return $this->tasks;
	}

	/**
	 * Register the individual services of this plugin.
	 *
	 * @since 1.0.0
	 */
	public function run_tasks() {
		array_walk(
			$this->tasks,
			function ( $task ) {

				if ( ! class_exists( $task[0] ) ) {
					throw new Exception( sprintf( 'Service class \'%s\' does not exist', $task[0] ) );
				}

				$class = new \ReflectionClass( $task[0] );

				if ( ! $class->implementsInterface( 'Awsm\WP_Wrapper\Building_Plans\Task' ) ) {
					throw new Exception( sprintf( 'Service class \'%s\' does not implement Task interface', $task[0] ) );
				}

				$instance = $class->newInstance( ...$task[1] );
				$instance->run();
			}
		);
	}
}

