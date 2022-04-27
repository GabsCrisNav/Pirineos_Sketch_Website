<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Agregar Harina</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
            
            <tr>
                <td>Tipo: </td>
                <td>
                    <input type="text" name="tipo" placeholder="tipo de dato">
                </td>
            </tr>

            <tr>
                <td>Nombre: </td>
                <td>
                    <input type="text" name="nombre" placeholder="Nombre de la harina">
                </td>
            </tr>

            <tr>
                <td>Titulo: </td>
                <td>
                    <input type="text" name="title" placeholder="Titulo del parrafo">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5" placeholder="Descripcion de la harina"></textarea>
                </td>
            </tr>

            <tr>
                <td>Selecciona la imagen: </td>
            <td>
                    <input type="text" name="image_name">
            </td>
        </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="add-harinas" class="btn-secondary">
                </td>
            </tr>

        </table>

    </form>

    <?php
        //check whether the button is clicked or not
        if(isset($_POST['submit']))
        {
            //Add the food in database
            //echo "Clicked";
            //1. Get the Data from form
            $tipo = $_POST['tipo'];
            $nombre = $_POST['nombre'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image_name = $_POST['image_name'];

            //2.upload the image if selected
            //check wheter the select image is clicked or not and upload the image only if selected
            /*if(isset($_FILES['image']['name']))/*
            {
                //Get the details of the selected image
                $image_name = $_FILES['image']['name'];

                //check wheter the image is selected or not and upload image only if is selected
                if($image_name != "")
                {
                    //image is selected
                    //A. rename the image
                    //get the extension of slected image (jpg, png, gif, etc..)
                    $ext = end(explode('.', $image_name));

                    // Create a new name for image
                    $image_name = "harinas".rand(0000,9999).".".$ext; //New image name may be "harinas"

                    //B.upload the image
                    //Get the src and destination path

                    //source path is the current location of the image
                    $src =$_FILES['image']['tmp_name'];

                    //destination path for the image to be upload
                    $dst = "../images/harinas/".$image_name;

                    //finally upload the foon image
                    $upload = move_uploaded_file($src, $dst);

                    //check wheter image upload of not
                    if($upload==false)
                    {
                        //failed to upload the image
                        //redirect to add harinas page with error message
                        $_SESSION['upload'] = "<div class='error'>Error al subir la imagen. </div>";
                        header('location:'.SITEURL.'admin/add-harinas.php');
                        //stop the process
                        die();
                    }
                }
            }
            else
            {
                $image_name = ""; //Settin default values
            }
            */
            
            //3.insert into data base

            //Create a sql querry to save or add harinas
            //for numerical value we dont need to pass calue inside quotes '' but for string it is
            $sql = "INSERT INTO tbl_ddt SET 
                tipo = '$tipo',
                nombre = '$nombre',
                title = '$title',
                description = '$description',
                image_name = '$image_name'
            ";
            
            //Execute the query
            $res = mysqli_query($conn, $sql);
            //Check wheter data inserted or not
            //4. redirect with message to manage harinas page
            if($res == true)
            {
                //Data inserted succesfully
                $_SESSION['add'] = "<div class='succes'>Harinas agregadas correctamente.</div>";
                header('location:'.SITEURL.'admin/manage-ddt.php');
            }
            else
            {
                //Failed to insert data
                $_SESSION['add'] = "<div class='error'>Error al agregar harinas.</div>";
                header('location:'.SITEURL.'admin/manage-ddt.php');
            }

            
        }
    ?>

    </div>

</div>
<?php include('partials/footer.php'); ?>
