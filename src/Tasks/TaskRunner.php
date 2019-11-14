<?php

namespace Awsm\WPWrapper\Tasks;

use Awsm\WPWrapper\Exceptions\Exception;


trait TaskRunner {
    /**
     * Tasks.
     *
     * @since 1.0.0
     *
     * @var array $services Registered services
     */
    protected $tasks = [];

    /**
     * Add Task.
     *
     * @since 1.0.0
     *
     * @param string $class Class name.
     * @param array $params Parameters to put in constructor.
     *
     * @return object $this Current object.
     */
    public function addTask( $class, ...$params )
    {
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
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Register the individual services of this plugin.
     *
     * @since 1.0.0
     */
    public function runTasks()
    {
        array_walk($this->tasks, function ( $task ) {

            if ( ! class_exists( $task[0] ) )
            {
                throw new Exception(sprintf('Service class \'%s\' does not exist', $task[0] ) );
            }

            $class = new \ReflectionClass( $task[0] );

            if ( ! $class->implementsInterface('Awsm\WPWrapper\BuildingPlan\Task' ) )
            {
                throw new Exception(sprintf('Service class \'%s\' does not implement Task interface', $task[0] ) );
            }

            $instance = $class->newInstance(...$task[1]);
            $instance->run();
        });
    }
}

