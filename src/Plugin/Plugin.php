<?php


namespace Awsm\WPWrapper\Plugin;

use Awsm\WPWrapper\BuildingPlans\Actions;
use Awsm\WPWrapper\Tasks\TaskRunner;

/**
 * Class Plugin.
 *
 * Main plugin controller class that hooks the plugin's functionality into the WordPress request lifecycle.
 *
 * @since   1.0.0
 * @package Awsm\WP_Plugin
 * @author  Sven Wagener <support@awesome.ug>
 */
class Plugin implements Actions
{
    use TaskRunner;

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
    protected $translationPath = '';

    /**
     * Running the plugin object.
     *
     * @since 1.0.0
     *
     * @return Plugin Plugin object.
     */
    public function __construct()
    {
        return $this;
    }

    /**
     * Register the plugin with the WordPress system.
     *
     * @return Plugin Plugin object.
     * @since 1.0.0
     *
     */
    public function boot()
    {
        $this->addActions();

        return $this;
    }

    /**
     * Adding actions.
     *
     * @since 1.0.0
     */
    public function addActions()
    {
        add_action('plugins_loaded', [$this, 'runTasks']);
        add_action('plugins_loaded', [$this, 'loadTranslation']);
    }

    /**
     * Set a textdomain.
     *
     * @since 1.0.0
     *
     * @param string $textdomain Textdomain.
     * @param string $translationPath Path to translation folder.
     *
     * @return Plugin Plugin object.
     */
    public function addTranslation($textdomain, $translationPath): Plugin
    {
        $this->textdomain = $textdomain;
        $this->translationPath = $translationPath;

        return $this;
    }


    /**
     * Load translation
     *
     * @since 1.0.0
     *
     * @return bool If translation is loaded.
     */
    public function loadTranslation()
    {
        return \load_plugin_textdomain($this->textdomain, false, $this->translationPath);
    }
}
