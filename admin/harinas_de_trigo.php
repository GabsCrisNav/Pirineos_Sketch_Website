<?php include('partials/menu.php');


?>

<div class="main-content" style = "flex-direction: row; display: flex">
    <div class="wrapper" style = "width: 75%; height:100%">
        <h1> Harinas para el hogar</h1>

        <br /> <br />

<div style = "display: block;
    align-items: center;
    overflow-y: scroll;
    height: 70vh">
<table class="tbl-full">
        <tr>
            <th style = "top: 0;z-index: 2;position: sticky;">S.N</th>
            <th style = "top: 0;z-index: 2;position: sticky;">nombre</th>
            <th style = "top: 0;z-index: 2;position: sticky;">titulo</th>
            <th style = "top: 0;z-index: 2;position: sticky;">descripcion</th>
            <th style = "top: 0;z-index: 2;position: sticky;">imagen</th>
            <th style = "top: 0;z-index: 2;position: sticky;">tipo</th>
        </tr>


        <?php
        $cs=mysqli_connect("localhost","root","");
        $cbd=mysqli_select_db($cs,"pirineos_website");

        $query = "SELECT * FROM `harinas_de_trigo` ";
        $sql=mysqli_query($cs,$query);

        $count = mysqli_num_rows($sql);
        

            //create serial number variable and set default value as 1
            $sn =1;

            if($count>0)
            {
                //we have harinas in database
                //Get the harinas from database and display
                while($row=mysqli_fetch_assoc($sql))
                {
                    //get the values from individual columns
                    $id_hdt = $row['id_hdt'];
                    $name_hdt = $row['name_hdt'];
                    $title_hdt = $row['title_hdt'];
                    $description_hdt = $row['description_hdt'];
                    $image_name_hdt = $row['image_name_hdt'];
                    $type_hdt = $row['type_hdt'];
                    ?>

                    <tr>
                        <th><?php echo $sn++; ?></th>
                        <th><?php echo $name_hdt; ?></th>
                        <th><?php echo $title_hdt; ?></th>
                        <th><?php echo $description_hdt; ?></th>
                        <th><?php echo $image_name_hdt; ?></th>
                        <th><?php echo $type_hdt; ?></th>
                    <tr>
                        <td>
                        <form action="?id_hdt=<?php echo $id_hdt; ?>" method="post">
                            <input type="submit" name="delete" value="delete-harinas" class="btn-secondary">
                            <input type="submit" name="update" value="update-harinas" class="btn-secondary">
                        </form>
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

    <div class="wrapper" style = "width: 20%">
        

        <h1>Agregar Harina</h1>

        <br><br>

        <form action="" method="post">

            <table class="tbl-30">

            <tr>
                <td>Tipo: </td>
                <td>
                <select name="tipo">
                    <option value="parrafo">parrafo</option>
                    <option value="producto">producto</option>
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
           //funciona bien
            $id=0;
            $cs=mysqli_connect("localhost","root","");
            $cbd=mysqli_select_db($cs,"pirineos_website");
            if(isset($_POST['submit'])){
            $tipo = $_POST['tipo'];
            $nombre = $_POST['nombre'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image_name = $_POST['image_name'];
            //Create a sql querry to save or add harinas
            //for numerical value we dont need to pass calue inside quotes '' but for string it is
            
                

            $query = "INSERT INTO  `harinas_de_trigo`(`id_hdt`, `name_hdt`, `title_hdt`, `description_hdt`, `image_name_hdt`, `type_hdt`)  VALUES ('$id','$nombre','$title','$description','$image_name','$tipo')";
            
            //Execute the query
            $sql = mysqli_query($cs,$query);
          }
        //funciona
          if(isset($_POST['delete'])){
            $id_hdt = $_GET['id_hdt'];

            $query = "DELETE FROM harinas_de_trigo WHERE id_hdt=$id_hdt";
            
            //Execute the query
            $sql = mysqli_query($cs,$query);
          }


            if(isset($_POST['update']))
            {
                
                //Get all th details
                $id_hdt = $_GET['id_hdt'];

                //SQL query to get the selected food
                $query = "SELECT * FROM harinas_de_trigo WHERE id_hdt=$id_hdt";
                
                //execute query 
                $sql = mysqli_query($cs,$query);

                //Get the value based on query executed
                $row = mysqli_fetch_assoc($sql);

                //Get the values of the selected harina
                $type_hdt = $row['type_hdt'];
                $name_hdt = $row['name_hdt'];
                $title_hdt = $row['title_hdt'];
                $description_hdt = $row['description_hdt'];
                $image_name_hdt = $row['image_name_hdt'];
            }
            else
            {
                //Redirect to Manage Food
                echo"error al conectar";
            }
            ?>


            <div class="wrapper" style = "width: 20%">
                    

                    <h1>Actualizar Harina</h1>

                    <br><br>

                    <form action="" method="post">

                        <table class="tbl-30">

                        <tr>
                            <td>Tipo: </td>
                            <td>
                            <select name="tipo">
                                <option value="parrafo">parrafo</option>
                                <option value="producto">producto</option>
                            </td>
                        </tr>

                        <tr>
                            <td>Nombre: </td>
                            <td>
                                <input type="text" name="nombre" value="<?php echo $name_hdt; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Titulo: </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $title_hdt; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Description: </td>
                            <td>
                                <textarea name="description" cols="30" rows="5"><?php echo $description_hdt; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Selecciona la imagen: </td>
                        <td>
                                <input type="text" name="image_name" value="<?php echo $image_name_hdt; ?>">
                        </td>
                    </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit" name="upha" value="update-harinas" class="btn-secondary">
                            </td>
                        </tr>

                    </table>

                </form>
            </div>


            <?php 
            $cs=mysqli_connect("localhost","root","");
            $cbd=mysqli_select_db($cs,"pirineos_website");
            if(isset($_POST['upha']))
                    {
                         //Get all th details
                        $id_hdt = $_GET['id_hdt'];

                        //echo "Button clicked";
                        //1. Get all the details fro the form
                        $tipo = $_POST['tipo'];
                        $nombre = $_POST['nombre'];
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $image_name = $_POST['image_name'];

                        //4. Update the Food in Database
                        $query2 = "UPDATE `harinas_de_trigo` SET `name_hdt`='$nombre',`title_hdt`='$title',`description_hdt`='$description',`image_name_hdt`='$image_name',`type_hdt`='$tipo' WHERE id_hdt = $id_hdt";
                        

                        //Execute query
                        $sql2 = mysqli_query($cs,$query2);

                        //Check wheter the query is executed or not
                        if($sql==true)
                        {
                            //query executed and harinas actualizadas
                            $_SESSION['update'] = "<div class='success'>harina actualizada con exito.</div>";
                        }
                        else
                        {
                            //failes to update harina
                            $_SESSION['update'] = "<div class='error'>error al actualizar harina.</div>";
                            
                        }

                        //REdirect to Manage Food with Session Message
                    }


    ?>


    

    </div>

</div>





<?php include('partials/footer.php') ?>
