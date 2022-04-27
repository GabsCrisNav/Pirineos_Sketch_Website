<?php
    //Include Constants Page
    include('../config/constants.php');

    //echo "Delete harinas Page";

    if(isset($_GET['id']))
    {
        //Either use "&8' or 'AND"
        //Process to Delete

        //echo "Process to Delete";
        //1. Get ID and Image NAme
        $id = $_GET['id'];

        //3. Delete harinas from Database
        $sql = "DELETE FROM tbl_hdtpeh WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        
        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage harinas with Session Message

        if($res==true)
        {
           //harinas Deleted
           $_SESSION['delete'] = "<div class='success'>harina eliminada exitosamente.</div>";\
           header('location:'.SITEURL.'admin/manage-hdtpeh.php');
        }
        else
        {
           //Failed to Delete harinas
           $_SESSION['delete'] = "<div class='success'>fallo al eliminar harina.</div>";\
           header('location:'.SITEURL.'admin/manage-hdtpeh.php');
        }
        

   }

?>
