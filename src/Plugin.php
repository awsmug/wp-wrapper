<?php


namespace Awsm\WP_Plugin;

use Awsm\WP_Plugin\Building_Plans\Hooks_Actions;
use Awsm\WP_Plugin\Building_Plans\Plugin AS Plugin_Interface;
use Awsm\WP_Plugin\Loaders\Hooks_Loader;
use Awsm\WP_Plugin\Loaders\Loader;
use Awsmug\WP_Plugin\Exceptions\Exception;

/**
 * Class Plugin.
 *
 * Main plugin controller class that hooks the plugin's functionality into the WordPress request lifecycle.
 *
 * @since   1.0.0
 * @package Awsm\WP_Plugin
 * @author  Sven Wagener <support@awesome.ug>
 */
class Plugin implements Plugin_Interface, Hooks_Actions {
    use Hooks_Loader, Loader;

    /**
     * Plugin name.
     *
     * @since 1.0.0
     *
     * @var string Plugin name.
     */
    protected $name = null;

    /**
     * Plugin version.
     *
     * @since 1.0.0
     *
     * @var string Plugin name.
     */
    protected $version = null;

    /**
     * Services
     *
     * @since 1.0.0
     *
     * @var array $services Registered services
     */
    protected $services = [];


    /**
     * Textdomain
     *
     * @since 1.0.0
     *
     * @var string $textdomain Textdomain
     */
    protected $textdomain = '';


    /**
     * Path to translation folder
     *
     * @since 1.0.0
     *
     * @var string $translationPath Path to translations
     */
    protected $translation_path = '';


    /**
     * Register the plugin with the WordPress system.
     *
     * @since 1.0.0
     *
     * @return Plugin
     */
    public function boot() {
        $this->load();

        return $this;
    }

    /**
     * Adding actions.
     *
     * @since 1.0.0
     */
    public function add_actions() {
        add_action( 'plugins_loaded', [$this, 'register_services'] );
        add_action( 'plugins_loaded', [$this, 'load_translation'] );
    }

    /**
     * Get plugin name.
     *
     * @since 1.0.0
     *
     * @return string Plugin name.
     */
    public function set_name( $name ) {
        $this->name = $name;
    }

    /**
     * Get plugin name.
     *
     * @since 1.0.0
     *
     * @return string Plugin name.
     */
    public function get_name() : string {
        return $this->name;
    }

    /**
     * Get plugin version.
     *
     * @since 1.0.0
     *
     * @return string Plugin version.
     */
    public function get_version() : string {
        return $this->version;
    }

    /**
     * Set plugin version.
     *
     * @since 1.0.0
     *
     * @param string Plugin version.
     */
    public function set_version( $version ) {
        $this->version = $version;
    }


    /**
     * Add service.
     *
     * @since 1.0.0
     *
     * @param string $class Class name.
     * @param array  $params Parameters to put in constructor.
     *
     * @return Plugin
     **/
    public function add_service( string $class, ...$params ) : Plugin {
        $this->services[] = array( $class, $params );

        return $this;
    }


    /**
     * Get the list of services to register.
     *
     * @since 1.0.0
     *
     * @return Service[] Array of fully qualified class names.
     *
     */
    private function get_services() {
        return $this->services;
    }


    /**
     * Register the individual services of this plugin.
     *
     * @since 1.0.0
     */
    public function register_services() {
        $services = $this->get_services();
        array_walk($services, function ( $service ) {

            if ( !class_exists( $service[0] ) ) {
                throw new Exception( sprintf( 'Service class \'%s\' does not exist', $service[0] ));
            }

            new $service[0](...$service[1]);
        });
    }


    /**
     * Set a textdomain.
     *
     * @since 1.0.0
     *
     * @param string $textdomain Textdomain.
     * @param string $translation_path Path to translation folder.
     * @return Plugin
     **/
    public function add_translation( $textdomain, $translation_path ): Plugin {
        $this->textdomain = $textdomain;
        $this->translation_path = $translation_path;

        return $this;
    }


    /**
     * Load translation
     *
     * @since 1.0.0
     *
     * @return bool If translation is loaded
     **/
    public function load_translation() {
        return load_plugin_textdomain($this->textdomain, false, $this->translation_path);
    }


}