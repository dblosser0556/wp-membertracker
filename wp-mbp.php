<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/dblosser0556
 * @since             1.0.0
 * @package           Wp_Mbp
 *
 * @wordpress-plugin
 * Plugin Name:       Member Profile
 * Plugin URI:        https://github.com/dblosser0556/wp-member-profile-capture
 * Description:       This plug in is used to capture and report on member information 
 * Version:           1.0.0
 * Author:            David L Blosser
 * Author URI:        https://github.com/dblosser0556
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-mbp
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
define( 'WP_MBP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-mbp-activator.php
 */
function activate_wp_mbp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-mbp-activator.php';
	Wp_Mbp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-mbp-deactivator.php
 */
function deactivate_wp_mbp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-mbp-deactivator.php';
	Wp_Mbp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_mbp' );
register_deactivation_hook( __FILE__, 'deactivate_wp_mbp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-mbp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_mbp() {

	$plugin = new Wp_Mbp();
	$plugin->run();

}
run_wp_mbp();
