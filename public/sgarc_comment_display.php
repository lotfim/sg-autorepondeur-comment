<?php

require_once plugin_dir_path(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Sgarc_Features.php';
require_once plugin_dir_path(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Sgarc_CommentHandler.php';

class Sgarc_comment_display{

    protected  $plugin_name;

    protected  $sgarc_features;


    public function __construct($plugin_name)
    {
        $this->plugin_name = $plugin_name;
        $this->sgarc_features = new Sgarc_Features($this->plugin_name);
    }



    public function complete_comment_display(){

        if($this->sgarc_features->acceptingConditionsIsCompleted()){
            include_once ('partials' . DIRECTORY_SEPARATOR . 'joining_list_agreement_box.php');
        }
    }

}