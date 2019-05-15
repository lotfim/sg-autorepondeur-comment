<?php

class Sgarc_comment_display{

    protected  $plugin_name;

    protected  $settings;

    public function __construct($plugin_name)
    {
        $this->plugin_name = $plugin_name;
    }



    public function complete_comment_display(){
        $this->settings = get_option($this->plugin_name);
        if($this->valid_settings()){
            include_once ('partials' . DIRECTORY_SEPARATOR . 'joining_list_agreement_box.php');

        }
    }

    protected function valid_settings(){
        $userNumber =(isset($this->settings['user_number'])) ? $this->settings['user_number'] : '';
        $listNumber =(isset($this->settings['list_number'])) ? $this->settings['list_number'] : '';
        $gpdrEnabled = (isset($this->settings['gpdr_enabled']) && $this->settings['gpdr_enabled']) ? 'checked' : '';
        $gpdrText = (isset($this->settings['gpdr_text'])) ? $this->settings['gpdr_text'] : '';
        return ('' !== $userNumber && '' !== $listNumber && '' !== $gpdrEnabled && '' !== $gpdrText);
    }

}