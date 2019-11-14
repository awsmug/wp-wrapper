<?php

namespace Awsm\WP_Plugin\Services;

/**
 * Interface Plugin_Interface
 *
 * @package SvenWagener\WP_Plugin
 *
 * @since 1.0.0
 */
interface Service {
    /**
     * Register function which executes scripts on registration.
     *
     * @since 1.0.0
     *
     * @return mixed
     */
    public function register();
}