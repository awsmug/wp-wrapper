<?php
/**
 * Class for adding admin editor scripts.
 *
 * @category Class
 * @package  Awsm\WPWrapper\Assets
 * @author   Sven Wagener
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://awesome.ug
 */

namespace Awsm\WPWrapper\Assets;

/**
 * Class Editor_Script.
 *
 * @since 1.0.0
 */
class Editor_Script extends Script {

	/**
	 * Where should the assets be registered.
	 *
	 * @var string Hook to register
	 */
	protected $hook = 'enqueue_block_editor_assets';
}
