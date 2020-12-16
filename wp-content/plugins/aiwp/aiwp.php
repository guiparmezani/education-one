<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              anyimage.io
 * @since             2.0.0
 * @package           Aiwp
 *
 * @wordpress-plugin
 * Plugin Name:       AnyImage.io Integration
 * Plugin URI:        anyimage.io
 * Description:       Integration with AnyImage.io
 * Version:           2.0.0
 * Author:            AnyImage.io
 * Author URI:        anyimage.io
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aiwp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) )
{
    die;
}

/**
 * Currently plugin version.
 * Start at version 2.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '2.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-aiwp-activator.php
 */
function activate_aiwp()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-aiwp-activator.php';
    Aiwp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-aiwp-deactivator.php
 */
function deactivate_aiwp()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-aiwp-deactivator.php';
    Aiwp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_aiwp' );
register_deactivation_hook( __FILE__, 'deactivate_aiwp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-aiwp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.0.0
 */
function run_aiwp()
{

    $plugin = new Aiwp();
    $plugin->run();

}

run_aiwp();
