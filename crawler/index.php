<?php
    include 'vendors/simple_html_dom.php';
    include 'vendors/Curl.php';
    include 'src/Client.php';

    $client = new Client();
    $client->login();

    // $postFields = array(
    //     "email" => "fritzgeralddumdum7@gmail.com",
    //     "password" => "y1lix2w6"
    // );

    // $curlHandler = curl_init();

    // curl_setopt($curlHandler, CURLOPT_URL, "http://nabepero.xyz/login");
    // curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
    // curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($curlHandler, CURLOPT_POST, 1);
    // curl_setopt($curlHandler, CURLOPT_POSTFIELDS, http_build_query($postFields));
    // curl_setopt($curlHandler, CURLOPT_COOKIEJAR, 'cookie.txt');

    // $response = curl_exec($curlHandler);
    // curl_close($curlHandler);
    // echo $response;

    // $html = new simple_html_dom();
    // $html->load($response);
    
    // foreach($html->find('#app') as $email)
    // echo $email->plaintext;
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Bbo - Web Crawler</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
    </head>
    <body>
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
