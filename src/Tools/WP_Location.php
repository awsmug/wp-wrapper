<?php

/**
 * Class for dertermining location.
 *
 * @category Class
 * @package  Awsm\Tools
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WP_Wrapper\Tools;

/**
 * Trait WP_Location.
 *
 * @since 1.0.0
 *
 * @package SvenWagener\WP_Plugin
 */

class WP_Location {
	/**
	 * Determining site admin.
	 *
	 * @return bool True on WordPress admin, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function admin() {
		return is_admin();
	}

	/**
	 * Determining site ajax.
	 *
	 * @return bool True on WordPress ajax, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function ajax() {
		return defined( 'DOING_AJAX' ) && DOING_AJAX;
	}

	/**
	 * Determining frontend.
	 *
	 * @return bool True on WordPress frontend, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function frontend() {
		return ! self::admin() && ! self::ajax();
	}

	/**
	 * Determining site home.
	 *
	 * @return bool True on WordPress home, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function home() {
		return is_front_page();
	}

	/**
	 * Determining page.
	 *
	 * @return bool True on WordPress page, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function page() : bool {
		return is_page();
	}

	/**
	 * Determining if page id is on current page.
	 *
	 * @param int $page_id Page id.
	 * @return bool True on WordPress page, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function page_id( int $page_id ) : bool {
		global $post;
		return is_page() && $page_id === $post->ID;
	}

	/**
	 * Determining blog home.
	 *
	 * @return bool True on WordPress blog home, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function blog_home() : bool {
		return is_home();
	}

	/**
	 * Determining blog post.
	 *
	 * @return bool True on WordPress blog home, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function blog_post() : bool {
		return is_single() && 'post' == get_post_type();
	}

	/**
	 * Determining blog post.
	 *
	 * @return bool True on WordPress blog home, false if not.
	 *
	 * @since 1.0.0
	 */
	public static function post_type( string $post_type ) : bool {
		return is_single() && $post_type == get_post_type();
	}
}
