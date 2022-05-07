<?php
    //Include constants.php file here
    include('../config/constants.php');

    //1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2. create soL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query ($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
      // Query Executed Successully and Admin Deleted
      //echo "Admin Deleted";
      //create SEssion Variable to Display Message
      $_SESSION['delete'] = "<div class='success'>Admin eliminado exitosamente.</div>";
      //Redirect to Manage Admin Page

      header('location:'.SITEURL.'manage-admin.php');
    }
    else
    {
      //Failed to Delete Admin
      //echo "Failed to Delete Admin";

      $_SESSION['delete'] = "<div class='error'>Error al eliminar admin.</div>";
      header('location:'.SITEURL.'manage-admin.php');
      //3. Redirect to Manage Admin page with message (success/error)
    }
   ?>
