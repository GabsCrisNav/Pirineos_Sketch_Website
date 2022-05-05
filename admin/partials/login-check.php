<?php
    // AUthorization - Access control
    //CHeck whether the user is logged in or not
    if(!isset ($_SESSION['user'])) //IF user session is not set
    {
        //user is not logged in
        //REdirect to login page with message
         $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel.</div>";
        //REdirect to Login Page
<<<<<<< HEAD
        header('location:'.SITEURL.'login.php');
=======
        header('location:'.SITEURL.'admin/login.php');
>>>>>>> 54577143f8a79633e6eba22431a33e16f512e9c1
    }
?>
