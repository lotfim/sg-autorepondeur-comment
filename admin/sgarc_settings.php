<?php

class Sgarc_settings{

    protected $plugin_name;

    public function __construct($plugin_name)
    {
        $this->plugin_name = $plugin_name;
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
        $valid['user_number'] = esc_html($input['user_number']);
        $valid['activation_code'] = esc_html($input['activation_code']);
        $valid['list_number'] = esc_html($input['list_number']);
        $valid['gpdr_enabled'] = (isset($input['gpdr_enabled']) ) ? 1 : 0;
        $valid['gpdr_text'] = esc_html($input['gpdr_text']);
        $valid['gpdr_required_to_submit_comment'] = (isset($input['gpdr_required_to_submit_comment']) ) ? 1 : 0;
        return $valid;
    }
}
