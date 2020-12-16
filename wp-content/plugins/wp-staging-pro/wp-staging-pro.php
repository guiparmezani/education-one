<?php

/**
 * Plugin Name: WP STAGING PRO
 * Plugin URI: https://wp-staging.com
 * Description: Create a staging clone site for testing & developing
 * Author: WP-STAGING
 * Author URI: https://wordpress.org/plugins/wp-staging
 * Version: 3.1.5
 * Text Domain: wp-staging
 * Domain Path: /languages/
 *
 * @package WPSTG
 * @category Development, Migrating, Staging
 * @author WP STAGING
 */

if (!defined("WPINC")) {
    die;
}

if (!defined('WPSTG_PRO_LOADED')) {
    define('WPSTG_PRO_LOADED', __FILE__);
}

// Standalone requirement-checking script
require_once 'Requirements/WpstgProRequirements.php';

if (!interface_exists('WpstgBootstrapInterface')) {
    interface WpstgBootstrapInterface {
        public function checkRequirements();
        public function bootstrap();
        public function passedRequirements();
    }
}

if (!class_exists('WpstgProBootstrap')) {
    class WpstgProBootstrap implements WpstgBootstrapInterface
    {
        private $shouldBootstrap = true;
        private $requirements;

        public function __construct(WpstgRequirements $requirements)
        {
            $this->requirements = $requirements;
        }

        public function checkRequirements()
        {
            try {
                $this->requirements->checkRequirements();
            } catch (Exception $e) {
                $this->shouldBootstrap = false;

                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log(sprintf("[Activation] WP STAGING Pro: %s", $e->getMessage()));
                }
            }
        }

        public function bootstrap()
        {
            // Early bail: Requirements not met.
            if (!$this->shouldBootstrap) {
                return;
            }

            // Absolute path to plugin dir /var/www/.../plugins/wp-staging(-pro)
            if (!defined('WPSTG_PLUGIN_DIR')) {
                define('WPSTG_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            // Absolute path and name to main plugin entry file /var/www/.../plugins/wp-staging(-pro)/wp-staging(-pro).php
            if (!defined('WPSTG_PLUGIN_FILE')) {
                define('WPSTG_PLUGIN_FILE', __FILE__);
            }

            require_once(__DIR__ . '/_init.php');
        }

        public function passedRequirements()
        {
            return $this->shouldBootstrap;
        }
    }
}

$bootstrap = new WpstgProBootstrap(new WpstgProRequirements(__FILE__));

// Pro requirement-checking runs after Free requirement-checking.
add_action('plugins_loaded', [$bootstrap, 'checkRequirements'], 6);
add_action('plugins_loaded', [$bootstrap, 'bootstrap'], 10);

/** Installation Hooks */
if (!class_exists('WPStaging\Install')) {
    require_once __DIR__ . "/install.php";

    $install = new \WPStaging\Install($bootstrap);
    register_activation_hook(__FILE__, [$install, 'activation']);
}
