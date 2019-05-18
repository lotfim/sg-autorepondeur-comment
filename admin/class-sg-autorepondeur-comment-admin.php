<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://good-plans.com
 * @since      1.0.0
 *
 * @package    Sg_Autorepondeur_Comment
 * @subpackage Sg_Autorepondeur_Comment/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sg_Autorepondeur_Comment
 * @subpackage Sg_Autorepondeur_Comment/admin
 * @author     Lotfi MANSEUR <lotfi.manseur@gmail.com>
 */

require_once plugin_dir_path(__FILE__) . DIRECTORY_SEPARATOR . 'sgarc_settings.php';

class Sg_Autorepondeur_Comment_Admin {


    private $settings;

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
		$this->settings = new Sgarc_settings($plugin_name);

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
		 * defined in Sg_Autorepondeur_Comment_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sg_Autorepondeur_Comment_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sg-autorepondeur-comment-admin.css', array(), $this->version, 'all' );

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
		 * defined in Sg_Autorepondeur_Comment_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sg_Autorepondeur_Comment_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sg-autorepondeur-comment-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function get_settings(){
	    return $this->settings;
    }

    function load_text_domain() {

       load_plugin_textdomain( $this->plugin_name, false, WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'sg-autorepondeur-comment' . DIRECTORY_SEPARATOR . 'languages' ) ;

    }
    public function handle_comment($comment_id){
	    var_dump(get_comment($comment_id));
	    die();
    }


}
