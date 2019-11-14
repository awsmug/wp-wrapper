<?php

namespace Awsm\WPWrapper\BuildingPlans;

/**
 * Interface Plugin_Interface
 *
 * @package Awsm\WPWrapper\BuildingPlans
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
    public function run();
}