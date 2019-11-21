<?php
    class Client {

    const USER_HTTP = 'fritzgeralddumdum7@gmail.com';
    const PASS_HTTP = 'y1lix2w6';

    private $curl;

        function __construct() {
            if($this->curl == null)
            {
                $this->curl = new Curl();
            }
        }

        public function login() {
            $res = $this->curl->execute('http://nabepero.xyz/login');
            $this->curl->closeSession();

            $dom = new simple_html_dom();
            $dom->load($res);

            // Get the token
            $token = $dom->find('input[name=_token]', 0)->value;

            $this->curl = new Curl();
            $this->curl->setPost(array('email' => self::USER_HTTP, 'password' => self::PASS_HTTP, '_token' => $token));
            $this->curl->setHTTP(self::USER_HTTP, self::PASS_HTTP);
            $res = $this->curl->execute('http://nabepero.xyz/login');
            $this->curl->closeSession();

            $this->curl = new Curl();
            $res = $this->curl->execute('http://nabepero.xyz/crawler');
            $dom->load($res);

            return $this->getDataHtml($dom);
        }

        public function getDataHtml($htmlDom) {
            $table = $htmlDom->find('table[id=mainTable]', 0);

            // initialize empty array to store the data array from each row
            $theData = array();
            $headers = array();

            // to be used as index in an array in grouping by date          
            $date = 0;

            foreach($table->find('th') as $head)
            {
                $headers[] = $head->innertext;
            }

            // loop over rows
            foreach($table->find('tr') as $k => $row)
            {

                // initialize array to store the cell data from each row
                $rowData = array();
                foreach($row->find('td') as $key => $cell){

                    // push the cells text to the array
                    $rowData[$headers[$key]]= $cell->innertext;

                    if($headers[$key] == 'date')
                    {
                        $date = $cell->innertext;
                    }
                }

                // push the rows data array to the 'big' array
                $theData[$date][] = $rowData;
            }

            return array('th' => $headers, 'td' => $theData);
        }

        public function getDataJSON() {
            // Sorry for not using this :(
        }
    }
?>