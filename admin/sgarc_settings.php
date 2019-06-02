<?php
defined( 'ABSPATH' ) or die( 'Forbidden!' );

require_once plugin_dir_path(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Sgarc_Features.php';
class Sgarc_settings{

    protected $plugin_name;

    protected $sgarc_features;

    public function __construct($plugin_name)
    {
        $this->plugin_name = $plugin_name;
        $this->sgarc_features = new Sgarc_Features($this->plugin_name);
    }

    public function add_options_page(){
        add_options_page(__('Sg-Autorepondeur Comment Settings', $this->plugin_name), 'Sg-Autorepondeur Comment', 'manage_options', 'sgarc_settings', array($this, 'display_settings') );

    }

    public function display_settings(){
        include_once ('partials' . DIRECTORY_SEPARATOR . 'settings_page.php');
    }

    public function register_settings(){
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
    }

    public function validate($input){
        $valid = array();
        $valid[Sgarc_Features::USER_ID] = esc_html($input[Sgarc_Features::USER_ID]);
        $valid[Sgarc_Features::ACTIVATION_CODE] = esc_html($input[Sgarc_Features::ACTIVATION_CODE]);
        $valid[Sgarc_Features::LIST_NUMBER] = esc_html($input[Sgarc_Features::LIST_NUMBER]);
        $valid[Sgarc_Features::GPDR_ENABLED] = (isset($input[Sgarc_Features::GPDR_ENABLED]) ) ? 1 : 0;
        $valid[Sgarc_Features::ACCEPTING_CONDITIONS_TEXT] = esc_html($input[Sgarc_Features::ACCEPTING_CONDITIONS_TEXT]);
        $valid[Sgarc_Features::ACCEPTING_CONDITIONS_REQUIRED] = (isset($input[Sgarc_Features::ACCEPTING_CONDITIONS_REQUIRED]) ) ? 1 : 0;
        return $valid;
    }
}
