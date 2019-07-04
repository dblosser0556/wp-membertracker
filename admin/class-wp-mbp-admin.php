<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/dblosser0556
 * @since      1.0.0
 *
 * @package    Wp_Mbp
 * @subpackage Wp_Mbp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Mbp
 * @subpackage Wp_Mbp/admin
 * @author     David L Blosser <blosserdl@gmail.com>
 */
class Wp_Mbp_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Mbp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Mbp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-mbp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Mbp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Mbp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-mbp-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_memberprofile_admin_menu()
	{

		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *
		 */
		//add_options_page( 'Reserve Me resource Setup', 'Add resources', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
		//);
		add_menu_page(
			'Manage Member Profiles',
			__('Member Profiles', 'wp-mbp'),
			'manage_options',
			$this->plugin_name,
			array($this, 'load_member_profiles'),
			'dashicons-calendar',
			6
		);

		
	}

	public function load_member_profiles()
	{
		require_once plugin_dir_path(__FILE__) . 'partials/wp-mbp-profilelist.php';
	}

	private function getTable($table)
	{
		global $wpdb;
		return "{$wpdb->prefix}wp-mbp_{$table}";
	}


	public function getMemberList()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT members.* FROM {$this->getTable('members')} as members");
	}


}



