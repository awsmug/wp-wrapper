<?php

namespace Awsm\WPWrapper\Assets;

use Awsm\WPWrapper\BuildingPlans\Actions;

/**
 * Class Style.
 *
 * @since 1.0.0
 *
 * @package Awsm\WPWrapper\Assets
 */
abstract class Style extends Asset implements Actions {

    /**
     * Media.
     *
     * @since 1.0.0
     *
     * @var string The media for which this stylesheet has been defined.
     */
    protected $media;

    /**
     * Script constructor.
     *
     * @since 1.0.0
     *
     * @param string $handle       Name of the handle. Should be unique.
     * @param string $source       Full URL of the script.
     * @param array  $dependencies An array of registered stylesheet handles this stylesheet depends on.
     * @param string $version      String specifying stylesheet version number.
     * @param string $media        The media for which this stylesheet has been defined.
     */
    public function __construct( $handle, $source, $dependencies = [], $version, $media = 'all' )
    {
        $this->media = $media;
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
        \wp_register_style( $this->handle, $this->src, $this->dependencies, $this->version, $this->media );
    }

    /**
     * Enqueuing script.
     *
     * @since 1.0.0
     */
    public function enqueue()
    {
        \wp_enqueue_style( $this->handle );
    }
}