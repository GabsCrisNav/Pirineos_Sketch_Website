<?php include('partials/menu.php') ?>

<div class="main-content">
   <div class="wrapper">
       <h1>Agregar Admin</h1>

<br><br>

        <?php
            if(isset($_SESSION['add']))//Checking wheter the session is set or not
            {
                echo $_SESSION['add']; //Display the session message if set
                unset($_SESSION['add']); // remove session message
            }
        ?>

       <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Nombre completo: </td>
                <td><input type="text" name="full_name" placeholder="Ingrese su nombre"></td>
            </tr>

            <tr>
                <td>Nombre de usuario: </td>
                <td><input type="text" name="username" placeholder="Ingrese su nombre de usuario"></td>
            </tr>

            <tr>
                <td>Contraseña: </td>
                <td><input type="password" name="password" placeholder="Ingrese su contraseña"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>

        </table>


       </form>
   </div>
</div>

<?php include('partials/footer.php') ?>

<?php

    //Process the Value from Form and Save it in Database
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //1. Get the data form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MDS


        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error());//Database Connection

        $db_select = mysqli_select_db($conn, 'pirineos_website') or die(mysqli_error());//Selection Database

        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die (mysqli_error($conn));

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //create a Session Variable to Display Message
             $_SESSION['add'] = "Admininistrador agregado exitosamente.";
             //redirect page

             header("location:".SITEURL.'manage-admin.php');

        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "Error al agregar administrador";
            //Redirect page to Admin
            header("location:".SITEURL.'manage-admin.php');

        }
    }

?>
