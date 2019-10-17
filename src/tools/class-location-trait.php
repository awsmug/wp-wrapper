<?php

namespace Awsm\WP_Plugin\Tools;

/**
 * Trait Class_Location_Trait.
 *
 * @since 1.1.0
 *
 * @package SvenWagener\WP_Plugin
 */
trait Class_Location_Trait {

    /**
     * Get full file location of class containing trait.
     *
     * @since 1.0.0
     *
     * @return false|string Locaton of class file.
     *
     * @throws \ReflectionException
     */
    public static function get_file() {
        $reflection = new \ReflectionClass( self::class );
        return $reflection->getFileName();
    }

    /**
     * Get path of class containing trait.
     *
     * @since 1.0.0
     *
     * @return false|string Path of class file.
     *
     * @throws \ReflectionException
     */
	public static function get_path() {
        return plugin_dir_path( self::get_file() );
	}

    /**
     * Get url of class containing trait.
     *
     * @since 1.0.0
     *
     * @return false|string Url of class file.
     *
     * @throws \ReflectionException
     */
	public static function get_url() {
        return plugin_dir_url( self::get_file() );
	}
}
