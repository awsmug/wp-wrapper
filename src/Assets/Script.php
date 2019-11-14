<?php

namespace Awsm\WPWrapper\Assets;

use Awsm\WPWrapper\BuildingPlans\Actions;

/**
 * Class Script
 *
 * @since 1.0.0
 *
 * @package Awsm\WPWrapper\Assets
 */
abstract class Script extends Asset implements Actions {

    /**
     * In footer.
     *
     * @since 1.0.0
     *
     * @var bool|bool
     */
    protected $inFooter = false;

    /**
     * Script constructor.
     *
     * @param string $handle       Name of the handle. Should be unique.
     * @param string $source       Full URL of the script.
     * @param array  $dependencies An array of registered stylesheet handles this stylesheet depends on.
     * @param string $version      String specifying stylesheet version number.
     * @param bool   $inFooter     Whether to enqueue the script before </body> instead of in the <head>. Default 'false'.
     */
    public function __construct( string $handle, string $source, array $dependencies = [], string $version, bool $inFooter )
    {
        $this->inFooter = $inFooter;
        $this->add_actions();
        parent::__construct($handle, $source, $dependencies, $version);
    }

    /**
     * Adding actions.
     *
     * @since 1.0.0
     */
    public function add_actions()
    {
        \add_action( $this->hook, [ $this, 'enqueue' ] );
    }

    /**
     * Registering script.
     *
     * @since 1.0.0
     */
    public function register()
    {
        \wp_register_script( $this->handle, $this->src, $this->dependencies, $this->version, $this->inFooter );
    }

    /**
     * Enqueuing script.
     *
     * @since 1.0.0
     */
    public function enqueue()
    {
        \wp_enqueue_script( $this->handle );
    }
}