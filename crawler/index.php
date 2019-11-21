<?php
    include 'vendors/simple_html_dom.php';
    include 'vendors/Curl.php';
    include 'src/Client.php';
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Bbo - Web Crawler</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	</head>
	
    <body>
    <nav class="navbar navbar-default navbar-static-top"></nav>
        <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class=" mt-12 panel-body">
            <form action="<? echo $_SERVER['PHP_SELF']?>" method="post" id="searchMealForm">
                <input type="submit" id="findMeal" value="UPDATE" class="btn btn-primary form-control"/>
            </form>
            <br>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $client = new Client();
                    $res = $client->login();

                    // loop to check if the index (date) has value
                    foreach ($res['td'] as $date => $rows) 
                    {
                        // Check if date existed
                        if($date) 
                        {
                            echo '
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                        <tr>';

                                            // Get all table headers
                                            foreach($res['th'] as $header)
                                            {
                                                echo '<th>'.$header.'</th>';
                                            }
                            echo'
                                        </tr>
                                    </thead>
                                <tbody>
                                ';

                                // Get all the table data
                                foreach($rows as $row) {
                                    echo '<tr>';
                                        foreach($row as $data) 
                                        {
                                            echo '<td>'. $data  .'</td>';
                                        }
                                    echo '</tr>';
                                }
                                    
                                echo'
                                </tbody>
                            </table>
                            ';
        
                        }
                    }
                }
            ?>
        </div>
        </div>
        </div>
        </div>
        </div>
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    </body>
</html>