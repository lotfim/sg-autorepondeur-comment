<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://good-plans.com
 * @since      1.0.0
 *
 * @package    Sg_Autorepondeur_Comment
 * @subpackage Sg_Autorepondeur_Comment/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sg_Autorepondeur_Comment
 * @subpackage Sg_Autorepondeur_Comment/includes
 * @author     Lotfi MANSEUR <lotfi.manseur@gmail.com>
 */
class Sg_Autorepondeur_Comment_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sg-autorepondeur-comment',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
