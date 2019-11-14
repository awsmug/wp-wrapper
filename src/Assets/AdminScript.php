<?php

namespace Awsm\WPWrapper\Assets;

class AdminScript extends Script
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'admin_enqueue_scripts';
}