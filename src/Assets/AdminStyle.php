<?php

namespace Awsm\WPWrapper\Assets;

class AdminStyle extends Style
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'admin_print_styles';
}