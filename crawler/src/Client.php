<?php

class Client {

    const USER_HTTP = 'fritzgeralddumdum7@gmail.com';
    const PASS_HTTP = 'y1lix2w6';

    private $curl;
    private $token;

    function __construct()
    {
        if($this->curl == null)
        {
            $this->curl = new Curl();
        }
    }

    public function login()
    {
        // TODO: Implement login() method.
        $response = $this->curl->execute("http://nabepero.xyz/login/");
        
        $html = new simple_html_dom();
        $html->load($response);
        
        foreach($html->find('input') as $inputs)
        {
            if($inputs->getAttribute('name') === "_token"){
                $this->token = $inputs->getAttribute('value');
            }
        }
        $this->curl->setPost(array("email" => Client::USER_HTTP, "password" => Client::PASS_HTTP, "_token" => $this->token));
        $this->curl->setHTTP(Client::USER_HTTP, Client::PASS_HTTP);
        $this->curl->closeSession();
        echo $this->token;

        return $response;
    }

    public function getDataHtml($htmlDom) {
        // TODO: Implement getDataHtml() method.
    }

    public function getDataJSON() {
        // TODO: Implement getDataJSON() method.
    }
}