<?php include('partials/menu.php');
$cs=mysqli_connect("localhost","root","");
$cbd=mysqli_select_db($cs,"pirineos_website");

?>

<div class="main-content" style = "flex-direction: row; display: flex">
    <div class="wrapper" style = "width: 50%; height:100%">
        <h1>Mejorantes RendiMix®</h1>

        <br /> <br />

        <div style = "display: block;
            align-items: center;
            overflow-y: scroll;
            height: 70vh">
        <table class="tbl-full">
        <tr>
            <th style = "top: 0;z-index: 2;position: sticky; background: white">S.N</th>
            <th style = "top: 0;z-index: 2;position: sticky; background: white">nombre</th>
            <th style = "top: 0;z-index: 2;position: sticky; background: white">titulo</th>
            <th style = "top: 0;z-index: 2;position: sticky; background: white">descripcion</th>
            <th style = "top: 0;z-index: 2;position: sticky; background: white">imagen</th>
        </tr>


        <?php


        $query = "SELECT * FROM `mejorantes_rendimix` ";
        $sql=mysqli_query($cs,$query);

        $count = mysqli_num_rows($sql);



            if($count>0)
            {
                //we have harinas in database
                //Get the harinas from database and display
                while($row=mysqli_fetch_assoc($sql))
                {
                    //get the values from individual columns
                    $id_mr = $row['id_mr'];
                    $name_mr = $row['name_mr'];
                    $title_mr = $row['title_mr'];
                    $description_mr = $row['description_mr'];
                    $image_name_mr = $row['image_name_mr'];


                      echo"
                      <tr>
                        <th>$id_mr</th>
                        <th>$name_mr</th>
                        <th>$title_mr</th>
                        <th>$description_mr</th>
                        <th>$image_name_mr</th>
                      <tr>
                        <td>
                        <form action='?id_mr= $id_mr' method='post'>
                            <input type='submit' name='delete' value='delete-harinas' class='btn-secondary'>
                            <input type='submit' name='update' value='update-harinas' class='btn-secondary'>
                        </form>
                        </td>
                    </tr>";


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
    <div style = "display: flex; flex-direction: row">
    <div class="wrapper" style = "">


        <h1>Agregar Harina</h1>

        <br><br>

        <form action="" method="post">

            <table class="tbl-30">

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
                    <input type="submit" name="submit" value="Agregar Harina" class="btn-secondary">
                </td>
            </tr>

        </table>

    </form>

  </div>
    <?php
           //funciona bien

           $url = SITEURL.'admin/manage-mr.php';

            if(isset($_POST['submit'])){
              $nombre = $_POST['nombre'];
              $title = $_POST['title'];
              $description = $_POST['description'];
              $image_name = $_POST['image_name'];

              $query = "INSERT INTO  `mejorantes_rendimix`( `name_mr`, `title_mr`, `description_mr`, `image_name_mr`)  VALUES ('$nombre','$title','$description','$image_name')";

              //Execute the query
              $sql = mysqli_query($cs,$query);
              echo '<script>showAlert();window.setTimeout(function () {HideAlert();},3000);</script>';
              echo "<meta http-equiv='refresh' content='0;url= '$url'>";
            }

        //funciona
          if(isset($_POST['delete'])){
            $id_mr = $_GET['id_mr'];

            $query = "DELETE FROM mejorantes_rendimix WHERE id_mr=$id_mr";

            //Execute the query
            $sql = mysqli_query($cs,$query);
            echo"<script>
                  window.onload = function() {
                      if(!window.location.hash) {
                          window.location = window.location + '#loaded';
                          window.location.reload();
                      }
                  }
                  </script>";
          }


            if(isset($_POST['update']))
            {

                //Get all th details
                $id_mr = $_GET['id_mr'];

                //SQL query to get the selected food
                $query = "SELECT * FROM mejorantes_rendimix WHERE id_mr=$id_mr";

                //execute query
                $sql = mysqli_query($cs,$query);

                //Get the value based on query executed
                $row = mysqli_fetch_assoc($sql);

                //Get the values of the selected harina
                $name_mr = $row['name_mr'];
                $title_mr = $row['title_mr'];
                $description_mr = $row['description_mr'];
                $image_name_mr = $row['image_name_mr'];

            }

            ?>


            <div class="wrapper" style = "margin: 0">


                    <h1>Actualizar Harina</h1>

                    <br><br>

                    <form action="" method="post">

                        <table class="tbl-30">


                        <tr>
                            <td>Nombre: </td>
                            <td>
                                <input type="text" name="nombre" value="<?php echo $name_mr; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Titulo: </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $title_mr; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Description: </td>
                            <td>
                                <textarea name="description" cols="30" rows="5"><?php echo $description_mr; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Selecciona la imagen: </td>
                        <td>
                                <input type="text" name="image_name" value="<?php echo $image_name_mr; ?>">
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

            if(isset($_POST['upha']))
                    {

                         //Get all th details
                        $id_mr = $_GET['id_mr'];

                        //echo "Button clicked";
                        //1. Get all the details fro the form
                        $nombre = $_POST['nombre'];
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $image_name = $_POST['image_name'];

                        //4. Update the Food in Database
                        $query2 = "UPDATE `mejorantes_rendimix` SET `name_mr`='$nombre',`title_mr`='$title',`description_mr`='$description',`image_name_mr`='$image_name' WHERE id_mr = $id_mr";


                        //Execute query
                        $sql2 = mysqli_query($cs,$query2);
                        echo"<script>
                              window.onload = function() {
                                  if(!window.location.hash) {
                                      window.location = window.location + '#loaded';
                                      window.location.reload();
                                  }
                              }
                              </script>";
                        //Check wheter the query is executed or not

                        //REdirect to Manage Food with Session Message
                    }


    ?>

</div>


    </div>

</div>




<?php include('partials/footer.php') ?>
