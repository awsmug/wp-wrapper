<?php
/**
 * Trait for location of a class.
 *
 * @category Class
 * @package  Awsm\Tools
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Tools;

/**
 * Trait Class_Location_Trait.
 *
 * @since 1.1.0
 *
 * @package SvenWagener\WP_Plugin
 */
trait Class_Location {

	/**
	 * Get full file location of class containing trait.
	 *
	 * @since 1.0.0
	 *
	 * @return false|string Locaton of class file.
	 *
	 * @throws \ReflectionException Throws exception on getting filename of class.
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
	 * @throws \ReflectionException Throws exception on getting filename of class.
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
	 * @throws \ReflectionException Throws exception on getting filename of class.
	 */
	public static function get_url() {
		return plugin_dir_url( self::get_file() );
	}
}
