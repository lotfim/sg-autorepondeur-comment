<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://good-plans.com
 * @since             1.0.0
 * @package           Sg_Autorepondeur_Comment
 *
 * @wordpress-plugin
 * Plugin Name:       SG-Autorepondeur Comment 
 * Plugin URI:        https://good-plans.com/sgar
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Lotfi MANSEUR
 * Author URI:        https://good-plans.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sg-autorepondeur-comment
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SG_AUTOREPONDEUR_COMMENT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sg-autorepondeur-comment-activator.php
 */
function activate_sg_autorepondeur_comment() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sg-autorepondeur-comment-activator.php';
	Sg_Autorepondeur_Comment_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sg-autorepondeur-comment-deactivator.php
 */
function deactivate_sg_autorepondeur_comment() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sg-autorepondeur-comment-deactivator.php';
	Sg_Autorepondeur_Comment_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sg_autorepondeur_comment' );
register_deactivation_hook( __FILE__, 'deactivate_sg_autorepondeur_comment' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sg-autorepondeur-comment.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sg_autorepondeur_comment() {

	$plugin = new Sg_Autorepondeur_Comment();
	$plugin->run();

}
run_sg_autorepondeur_comment();
