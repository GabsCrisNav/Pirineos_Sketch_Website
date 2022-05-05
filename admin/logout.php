<?php
    //Include constants.php for SITEURL
    include('../config/constants.php');
    //1. Destory the Session
    session_destroy();//Unsets $_SESSION "user



    //2. REdirect to Login Page
<<<<<<< HEAD
    header('location:'.SITEURL.'login.php');
=======
    header('location:'.SITEURL.'admin/login.php');
>>>>>>> 54577143f8a79633e6eba22431a33e16f512e9c1

    ?>