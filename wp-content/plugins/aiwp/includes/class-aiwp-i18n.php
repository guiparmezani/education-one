<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       anyimage.io
 * @since      2.0.0
 *
 * @package    Aiwp
 * @subpackage Aiwp/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      2.0.0
 * @package    Aiwp
 * @subpackage Aiwp/includes
 * @author     AnyImage.io <support@anyimage.io>
 */
class Aiwp_i18n
{


    /**
     * Load the plugin text domain for translation.
     *
     * @since    2.0.0
     */
    public function load_plugin_textdomain()
    {

        load_plugin_textdomain(
            'aiwp',
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );

    }


}
