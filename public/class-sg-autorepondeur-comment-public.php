<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://good-plans.com
 * @since      1.0.0
 *
 * @package    Sg_Autorepondeur_Comment
 * @subpackage Sg_Autorepondeur_Comment/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sg_Autorepondeur_Comment
 * @subpackage Sg_Autorepondeur_Comment/public
 * @author     Lotfi MANSEUR <lotfi.manseur@gmail.com>
 */
require_once plugin_dir_path(__FILE__) . DIRECTORY_SEPARATOR . 'sgarc_comment_display.php';
class Sg_Autorepondeur_Comment_Public {

	protected $agreementBox;

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->agreementBox = new Sgarc_comment_display($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sg-autorepondeur-comment-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sg-autorepondeur-comment-public.js', array( 'jquery' ), $this->version, true );

	}

	public function getAgreementBox(){
	    return $this->agreementBox;
    }

    public function disable_html5_support(){

    }

}
