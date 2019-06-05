<?php
defined( 'ABSPATH' ) or die( 'Forbidden!' );
class API_SG
{
    private $memberId;
    private $activationCode;
    private $datas = array();
    private $apiUrl = 'http://sg-autorepondeur.com/API_V2/';


    public function __construct($memberId, $activationCode)
    {
        $this->memberId        = $memberId;
        $this->activationCode  = $activationCode;

        $this->datas['membreid']       = $this->memberId;
        $this->datas['codeactivation'] = $this->activationCode;
    }

    public function set($name, $value = '')
    {
        if (is_array($name)) {
            foreach($name as $id => $value)
                $this->set($id, $value);
        } else {
            $this->datas[$name] = $value;
        }
        return $this;
    }

    public function call($action)
    {
        $this->datas['action'] = $action;
        $req = wp_remote_post($this->apiUrl, array(
            'method' => 'POST',
            'sslverify' => false,
            'headers' => array(),
            'cookies' => array(),
            'body' => $this->datas
        ));

        return $req;
    }
}