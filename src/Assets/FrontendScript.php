<?php

namespace Awsm\WPWrapper\Assets;

class FrontendScript extends Script
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'wp_enqueue_scripts';
}