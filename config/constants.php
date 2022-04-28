<?php
    //start Session
    session_start();

    define('SITEURL', 'http://localhost/admin/');

    //create Constants to Store Non Repeating values
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

     $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//Database Connection

?>
