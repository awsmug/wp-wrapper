# WP Wrapper

Wrapping WordPress for more beautiful code.

## Plugins

The plugin wrapper helps you to initialize your plugin.

```php
<?php
/**
 * Plugin Name: Example plugin
 */

// Path to composer autoload file.
require dirname( __DIR__ ) .'/vendor/autoload.php'; 

(new \Awsm\WPWrapper\Plugin\Plugin() )
    ->addTranslation( 'example-plugin', dirname(__DIR__) . '/languages' )
    ->addService(MyService::class)
    ->boot();
```

## Services

A service is a class with your program code and contains the service interface.

```php
<?php
/**
 * Plugin Name: Example plugin
 */

class MyService implements \Awsm\WPWrapper\BuildingPlans\Service {
    public function run() {
        // Your code here
    }
}
```