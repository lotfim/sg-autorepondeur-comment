<?php
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

        $handle = curl_init($this->apiUrl);
        curl_setopt($handle, CURLOPT_POST, true);
        curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($this->datas));
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        
		$req = curl_exec($handle);
		curl_close($handle);
		
        /*if ($req === FALSE) {
            throw new Exception('Aucun résultat renvoyé par SG-Autorépondeur');
        }*/
        return $req;
    }
}