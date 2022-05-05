<?php include('../config/constants.php'); ?>


<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
             <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                     echo $_SESSION['login'];
                     unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }

            ?>
            <br><br>

             <!-- Login Form Starts HEre -->
             <form action="" method="POST" class="text-center">
             Username:<br>
             <input type="text" name="username" placeholder="Enter Username"><br><br>
             Password:<br>
             <input type="password" name="password" placeholder="Enter Password"><br><br>
             <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br> 
            </form>
             <!-- Login Form Ends HEre -->

             <p class="text-center">Created By - <a href-"#">tec</a></p>

        </div>
    </body>
</html>

<?php
    //CHeck whether the Submit Button is clicked or Not
   if(isset($_POST['submit']))
   {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
       
        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
        
        if($count==1)
        {
            //User AVailabld and login succes
            $_SESSION['login'] = "<div class='succes'>Login Succesful</div>";
            $_SESSION['user'] = $username; //Check wheter the user is logged in or not and logout will unset it
            
            //Redirect to HOME PAGE/dashboard
<<<<<<< HEAD
            header('location:'.SITEURL.'index.php');
=======
            header('location:'.SITEURL.'admin/');
>>>>>>> 54577143f8a79633e6eba22431a33e16f512e9c1
        }  
        else
        {
            //user not Available and login fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Pasword did not match.</div>";
            //Redirect to HOME PAGE/dashboard
            header('location:'.SITEURL.'admin/login.php');

        }
   }
?>