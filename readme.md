# WP Wrapper

Wrapping WordPress for more beautiful code.

## Plugins

The plugin wrapper helps you to initialize your plugin

```php
<?php
/**
 * Plugin Name: Example plugin
 */

(new Plugin)
    ->addTranslation($textdomain, $pathToDirectory)
    ->addService(Service::class)
    ->boot();
```

