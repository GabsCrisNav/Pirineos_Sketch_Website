<?php
    //start Session
    session_start();

<<<<<<< HEAD
    define('SITEURL', 'http://localhost/web_pirineos/admin/');
=======
    define('SITEURL', 'http://localhost/admin/');
>>>>>>> 54577143f8a79633e6eba22431a33e16f512e9c1

    //create Constants to Store Non Repeating values
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
<<<<<<< HEAD
    define('DB_NAME', 'pirineos_website');

     $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//Database Connection
     $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());//Selection Database
=======

     $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//Database Connection

>>>>>>> 54577143f8a79633e6eba22431a33e16f512e9c1
?>
