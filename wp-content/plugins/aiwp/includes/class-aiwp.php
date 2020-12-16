<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       anyimage.io
 * @since      2.0.0
 *
 * @package    Aiwp
 * @subpackage Aiwp/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.0.0
 * @package    Aiwp
 * @subpackage Aiwp/includes
 * @author     AnyImage.io <support@anyimage.io>
 */
class Aiwp
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    2.0.0
     * @access   protected
     * @var      Aiwp_Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    2.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    2.0.0
     * @access   protected
     * @var      string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    2.0.0
     */
    public function __construct()
    {
        if ( defined( 'PLUGIN_NAME_VERSION' ) )
        {
            $this->version = PLUGIN_NAME_VERSION;
        }
        else
        {
            $this->version = '2.0.0';
        }
        $this->plugin_name = 'aiwp';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();

    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Aiwp_Loader. Orchestrates the hooks of the plugin.
     * - Aiwp_i18n. Defines internationalization functionality.
     * - Aiwp_Admin. Defines all hooks for the admin area.
     * - Aiwp_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    2.0.0
     * @access   private
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-aiwp-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-aiwp-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-aiwp-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-aiwp-public.php';

        $this->loader = new Aiwp_Loader();

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Aiwp_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    2.0.0
     * @access   private
     */
    private function set_locale()
    {

        $plugin_i18n = new Aiwp_i18n();

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    2.0.0
     * @access   private
     */
    private function define_admin_hooks()
    {

        $plugin_admin = new Aiwp_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     2.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     2.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    2.0.0
     * @access   private
     */
    private function define_public_hooks()
    {

        $plugin_public = new Aiwp_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    2.0.0
     */
    public function run()
    {
        $this->loader->run();
        $this->handle();
    }


    public function handle()
    {

        $anyimage_url = 'https://anyimage.io';
        // Respond to ping
        if ( isset( $_GET[ 'ping' ] ) )
        {
            $response = wp_remote_get( $anyimage_url );
            if ( !is_array( $response ) || empty( $response[ 'body' ] ) )
            {
                die( 'problem' );
            }
            die( 'pong' );
        }

        // Respond to card
        if ( isset( $_GET[ 'card' ] ) )
        {
            try
            {
                $aiApiUrl = $anyimage_url . '/card/' . $_GET[ 'card' ]
                    . '?aiip=' . ( !empty( $_SERVER[ 'REMOTE_ADDR' ] ) ? $_SERVER[ 'REMOTE_ADDR' ] : '' )
                    . '&network=' . ( !empty( $_GET[ 'network' ] ) ? $_GET[ 'network' ] : '' )
                    . '&aireferer=' . rawurlencode( $_SERVER[ 'HTTP_REFERER' ] )
                    . '&userAgent=' . rawurlencode( $_SERVER[ 'HTTP_USER_AGENT' ] );

                $response = wp_remote_get( $aiApiUrl );
                if ( !is_array( $response ) || empty( $response[ 'body' ] ) )
                {
                    header( 'Location: ' . $aiApiUrl );
                }
                die( $response[ 'body' ] );
            }
            catch ( \Exception $e )
            {
                die( 'Something went wrong' );
            }
        }
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     2.0.0
     * @return    Aiwp_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

}
