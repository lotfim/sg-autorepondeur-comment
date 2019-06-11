<?php
defined( 'ABSPATH' ) or die( 'Forbidden!' );

require_once plugin_dir_path(__FILE__) . DIRECTORY_SEPARATOR . 'API_SG.php';

class Sgarc_CommentHandler
{
    const ACCEPTING_TO_JOIN_REQUIRED = 'gpdr_agreement_required_to_submit_comment';

    protected $plugin_name;

    public function __construct($plugin_name)
    {
        $this->plugin_name = $plugin_name;
    }



    public function add_to_list($comment){
        $sgarcFeatures = new Sgarc_Features($this->plugin_name);
        if($sgarcFeatures->isValid()){
            $sgarApi = new API_SG($sgarcFeatures->getUserId(), $sgarcFeatures->getActivationCode());
            $sgarApi->set('prenom',  $comment->comment_author)
                    ->set('email', $comment->comment_author_email)
                    ->set('ip', $comment->comment_author_IP);
            $sgarApi->call('set_subscriber');
        }
    }

    public function onSubmit_comment($comment_id){
        $settings = new Sgarc_Features($this->plugin_name);
        $accetpingJoiningList = get_comment_meta($comment_id, self::ACCEPTING_TO_JOIN_REQUIRED, true);
        $comment = get_comment($comment_id);
        if(($settings->isValid() && !$settings->acceptingConditionsIsCompleted()) ||
            ($settings->isValid() && $settings->acceptingConditionsIsCompleted() && 'on' === $accetpingJoiningList)){
            $this->add_to_list($comment);


        }

    }

    public function add_comment_meta($comment_id){
        if(isset($_POST[self::ACCEPTING_TO_JOIN_REQUIRED])){
        	$acceptingToJoin = sanitize_key($_POST[self::ACCEPTING_TO_JOIN_REQUIRED]);
            add_comment_meta($comment_id, self::ACCEPTING_TO_JOIN_REQUIRED, $acceptingToJoin);

        }
    }
}