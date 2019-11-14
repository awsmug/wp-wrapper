<?php

namespace Awsm\WPWrapper\BuildingPlans;

/**
 * Task Plugin_Interface
 *
 * @package Awsm\WPWrapper\BuildingPlans
 *
 * @since 1.0.0
 */
interface Task {
    /**
     * Register function which executes scripts.
     *
     * @since 1.0.0
     *
     * @return mixed
     */
    public function run();
}