<?php

/**
 * Plugin Name: WP STAGING PRO
 * Plugin URI: https://wp-staging.com
 * Description: Create a staging clone site for testing & developing
 * Author: WP-STAGING
 * Author URI: https://wordpress.org/plugins/wp-staging
 * Version: 3.1.8
 * Text Domain: wp-staging
 * Domain Path: /languages/
 *
 * @package WPSTG
 * @category Development, Migrating, Staging
 * @author WP STAGING
 */

namespace WPStaging\Bootstrap\V1;

if (!defined("WPINC")) {
    die;
}

if (!defined('WPSTG_PRO_LOADED')) {
    define('WPSTG_PRO_LOADED', __FILE__);
}

require_once __DIR__ . '/Bootstrap/V1/Requirements/WpstgProRequirements.php';
require_once __DIR__ . '/Bootstrap/V1/WpstgBootstrap.php';

if (!class_exists(WpstgProBootstrap::class)) {
    class WpstgProBootstrap extends WpstgBootstrap
    {
        protected function afterBootstrap()
        {
            if (!defined('WPSTG_PLUGIN_FILE')) {
                define('WPSTG_PLUGIN_FILE', __FILE__);
            }

            // WP STAGING version number
            if (!defined('WPSTGPRO_VERSION')) {
                define('WPSTGPRO_VERSION', '3.1.8');
            }

            // Compatible up to WordPress Version
            if (!defined('WPSTG_COMPATIBLE')) {
                define('WPSTG_COMPATIBLE', '5.6');
            }

            require_once __DIR__ . '/constants.php';

            require_once(__DIR__ . '/_init.php');
        }
    }
}

$bootstrap = new WpstgProBootstrap(__DIR__, new WpstgProRequirements(__FILE__));

// Pro requirement-checking runs after Free requirement-checking.
add_action('plugins_loaded', [$bootstrap, 'checkRequirements'], 6);
add_action('plugins_loaded', [$bootstrap, 'bootstrap'], 10);

/** Installation Hooks */
if (!class_exists('WPStaging\Install')) {
    require_once __DIR__ . "/install.php";

    $install = new \WPStaging\Install($bootstrap);
    register_activation_hook(__FILE__, [$install, 'activation']);
}
