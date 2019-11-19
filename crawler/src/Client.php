<?php

class Client {

    const USER_HTTP = 'fritzgeralddumdum7@gmail.com';
    const PASS_HTTP = 'y1lix2w6';

    private $curl;

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
        $this->curl->setHTTP('fritzgeralddumdum7@gmail.com', 'y1lix2w6');
        $response = $this->curl->execute("http://nabepero.xyz/crawler");
        $this->curl->closeSession();
        print_r($response);
        die();
    }

    public function getDataHtml($htmlDom) {
        // TODO: Implement getDataHtml() method.
    }

    public function getDataJSON() {
        // TODO: Implement getDataJSON() method.
    }
}