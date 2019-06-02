<?php
defined( 'ABSPATH' ) or die( 'Forbidden!' );

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://lotmantech.com
 * @since      1.0.0
 *
 * @package    Sg_Autorepondeur_Comment
 * @subpackage Sg_Autorepondeur_Comment/includes
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
 * @since      1.0.0
 * @package    Sg_Autorepondeur_Comment
 * @subpackage Sg_Autorepondeur_Comment/includes
 * @author     Lotfi MANSEUR <lotfi.manseur@gmail.com>
 */
class Sg_Autorepondeur_Comment {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Sg_Autorepondeur_Comment_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'SG_AUTOREPONDEUR_COMMENT_VERSION' ) ) {
			$this->version = SG_AUTOREPONDEUR_COMMENT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'sg-autorepondeur-comment';

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
	 * - Sg_Autorepondeur_Comment_Loader. Orchestrates the hooks of the plugin.
	 * - Sg_Autorepondeur_Comment_i18n. Defines internationalization functionality.
	 * - Sg_Autorepondeur_Comment_Admin. Defines all hooks for the admin area.
	 * - Sg_Autorepondeur_Comment_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-sg-autorepondeur-comment-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-sg-autorepondeur-comment-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-sg-autorepondeur-comment-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-sg-autorepondeur-comment-public.php';

		$this->loader = new Sg_Autorepondeur_Comment_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Sg_Autorepondeur_Comment_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Sg_Autorepondeur_Comment_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Sg_Autorepondeur_Comment_Admin( $this->get_plugin_name(), $this->get_version() );


        $this->loader->add_action( 'admin_init', $plugin_admin->get_settings(), 'register_settings' );
		$this->loader->add_action( 'admin_menu', $plugin_admin->get_settings(), 'add_options_page' );
        $this->loader->add_action( 'plugins_loaded', $plugin_admin, 'load_text_domain' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Sg_Autorepondeur_Comment_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action('comment_post', $plugin_public->getCommentHandler(), 'add_comment_meta');
        $this->loader->add_action('comment_post', $plugin_public->getCommentHandler(), 'onSubmit_comment');
		$this->loader->add_action('comment_form_after_fields', $plugin_public->getAgreementBox(), 'complete_comment_display');
		$this->loader->add_action( 'wp_footer', $plugin_public, 'disable_html5_support' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Sg_Autorepondeur_Comment_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}



}
