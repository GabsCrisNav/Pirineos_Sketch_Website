<?php 
    //start Session
    session_start();

    define('SITEURL', 'http://localhost/proyecto_pirineos/');

    //create Constants to Store Non Repeating values
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'harinas-ordenes');

     $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//Database Connection
     $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());//Selection Database

?>