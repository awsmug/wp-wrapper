# WP Wrapper

Wrapping WordPress for more beautiful code.

## Installation

Use composer to add WP Wrapper to our code.
```shell script
composer require awsm/wp-wrapper
```

## Plugins

The plugin wrapper helps you to initialize your plugin. This is a simple example for a plugin.

```php
<?php
/**
 * Plugin Name: Example plugin.
 */
// Path to composer autoload file.
require dirname( __DIR__ ) .'/vendor/autoload.php'; 

(new \Awsm\WP_Wrapper\Plugin\Plugin() )
    ->addTranslation( 'example-plugin', dirname(__DIR__) . '/languages' )
    ->add_task(MyTask::class)
    ->boot();
```

## Tasks

A task is a class with your program code and contains the task interface. 

```php
<?php
/**
 * Example service.
 **/
class My_Task implements \Awsm\WP_Wrapper\Building_Plans\Task {
    public function run() {
        // Your code here
    }
}
```

## Task runner

The task runner is a trait which can be used in classes which have to start tasks.

```php
<?php
/**
 * Example task runner class.
 **/
class My_Task_Runner {
    use \Awsm\WP_Wrapper\Tasks\Task_Runner;
    
    public function __construct() {
        $this->runTasks();
    }
}

(new My_Task_Runner())->add_task( My_Task::class );
```

But better load the scripts where they have to be loaded. Use the action interface to do your actions.

```php
<?php
/**
 * Example task runner class.
 **/
class My_Task_Runner implements Awsm\WP_Wrapper\Building_Plans\Actions {
    use \Awsm\WP_Wrapper\Tasks\Task_Runner;
    
    public function __construct() {
        $this->runTasks();
    }

    public function add_actions(){
        add_action( 'select_a_hook_here', [ $this, 'run_tasks'] );
    }

}

(new My_Task_Runner())->add_task( My_Task::class );
```


## Task depency injection

It is possible to use depency injection in the constructor by passing objects on task addition.

