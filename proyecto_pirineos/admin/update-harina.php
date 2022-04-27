<?php include('partials/menu.php'); ?>

<?php
//CHeck whether id is set or not
if(isset($_GET['id']))
{
    //Get all th details
    $id = $_GET['id'];

    //SQL query to get the selected food
    $sql = "SELECT * FROM tbl_harinas WHERE id=$id";
    
    //execute query 
    $res = mysqli_query($conn, $sql);

    //Get the value based on query executed
    $row = mysqli_fetch_assoc($res);

    //Get the values of the selected harina
    $tipo = $row['tipo'];
    $nombre = $row['nombre'];
    $title = $row['title'];
    $description = $row['description'];
    $image_name = $row['image_name'];
}
else
{
    //Redirect to Manage Food
    echo"error al conectar";
    header('location:'.SITEURL.'admin/manage-hdtpeh.php');
}
?>


<div class="main-content">
    <div class="wrapper">
    <h1>Actualizar harinas</h1>
    <br><br>

    <form action="" method="POST" enctype="multipart/form-data">

    <table class="tbl-30">

    <tr>
        <td>Tipo: </td>
        <td>
            <input type="text" name="tipo" value="<?php echo $tipo; ?>">
        </td>
    </tr>

    <tr>
        <td>Nombre: </td>
        <td>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        </td>
    </tr>

    <tr>
        <td>Titulo: </td>
        <td>
            <input type="text" name="title" value="<?php echo $title; ?>">
        </td>
    </tr>

    <tr>
        <td>Descripción: </td>
        <td>
            <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
        </td>
    </tr>

    <tr>
        <td>imagen: </td>
        <td>
            <input type="text" name="image_name" value="<?php echo $title; ?>">
        </td>
    </tr>

    <tr>
        <td>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="update harinas" class="btn-secondary":>
        </td>
    </tr>

            </table>
            </form>

            </div>
    </div>
            
            <?php
                if(isset($_POST['submit']))
                {
                    //echo "Button clicked";
                    //1. Get all the details fro the form
                    $id = $_POST['id'];
                    $tipo = $_POST['tipo'];
                    $nombre = $_POST['nombre'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $image_name = $_POST['image_name'];

                    //4. Update the Food in Database
                    $sql2 = "UPDATE tbl_harinas SET
                        tipo = '$tipo',
                        nombre = '$nombre',
                        title = '$title',
                        description = '$desription',
                        image_name = '$image_name'
                        WHERE id=$id
                    ";

                    //Execute query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check wheter the query is executed or not
                    if($res2==true)
                    {
                        //query executed and harinas actualizadas
                        $_SESSION['update'] = "<div class='success'>harina actualizada con exito.</div>";
                        header('location:'.SITEURL.'admin/manage-harina.php');
                    }
                    else
                    {
                        //failes to update harina
                        $_SESSION['update'] = "<div class='error'>error al actualizar harina.</div>";
                        header('location:'.SITEURL.'admin/manage-harina.php');
                    }

                    //REdirect to Manage Food with Session Message
                }

            ?>
        

    <?php include('partials/footer.php'); ?>
