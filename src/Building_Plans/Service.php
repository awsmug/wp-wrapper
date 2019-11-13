<?php

namespace Awsm\WP_Plugin\Building_Plans;

/**
 * Interface Plugin_Interface
 *
 * @package SvenWagener\WP_Plugin
 *
 * @since 1.0.0
 */
interface Service {
    /**
     * Registers the service.
     *
     * @since 1.0.0
     *
     * @return void.
     */
    public function register();
}
