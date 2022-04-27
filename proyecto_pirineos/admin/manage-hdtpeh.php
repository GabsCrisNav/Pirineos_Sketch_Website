<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Harinas para el hogar</h1>

        <br /> <br />


<!-- Button to Add Admin -->
<a href="<?php echo SITEURL; ?>admin/add-hdtpeh.php" class="btn-primary">Agregar Harinas</a>

<br /> <br /> <br />

<?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }


    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }

    if(isset($_SESSION['unauthorize']))
    {
        echo $_SESSION['unauthorize'];
        unset($_SESSION['unauthorize']);
    }

    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    

?>

<table class="tbl-full"> 
        <tr>
            <th>S.N</th>
            <th>tipo</th>
            <th>nombre</th>
            <th>descripcion</th>
            <th>imagen</th>
        </tr>

        <?php 
            //create a SQL query to get all the food
            $sql = "SELECT * FROM tbl_hdtpeh";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //count rows to check wheter we have foods or not
            $count = mysqli_num_rows($res);

            //create serial number variable and set default value as 1
            $sn =1;

            if($count>0)
            {
                //we have harinas in database
                //Get the harinas from database and display
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the values from individual columns
                    $id = $row['id'];
                    $tipo = $row['tipo'];
                    $nombre = $row['nombre'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <tr>
                        <th><?php echo $sn++; ?></th>
                        <th><?php echo $tipo; ?></th>
                        <th><?php echo $nombre; ?></th>
                        <th><?php echo $title; ?></th>
                        <th><?php echo $image_name; ?></th>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-hdtpeh.php?id=<?php echo $id; ?>" class="btn-secondary">actualizar harinas</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-hdtpeh.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Eliminar harinas</a>
                        </td>
                    </tr>

                    <?php
                }
            }
            else
            {
                //food not added in database
                echo"<tr><td colspan='6' class='error'> No hay harinas aun.</td></tr>";
            }

        ?>

        

</table>

    </div>
</div>



<?php include('partials/footer.php') ?>
