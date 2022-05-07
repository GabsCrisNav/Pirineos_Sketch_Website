<?php include('partials/menu.php');
$cs=mysqli_connect("localhost","root","");
$cbd=mysqli_select_db($cs,"pirineos_website");

?>

<div class="main-content" style = "flex-direction: row; display: flex">
    <div class="wrapper" style = "width: 50%; height:100%">
        <h1> Harinas para el hogar</h1>

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


        $query = "SELECT * FROM `harinas_de_trigo` ";
        $sql=mysqli_query($cs,$query);

        $count = mysqli_num_rows($sql);



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


                      echo"
                      <tr>
                        <th>$id_hdt</th>
                        <th>$name_hdt</th>
                        <th>$title_hdt</th>
                        <th>$description_hdt</th>
                        <th>$image_name_hdt</th>
                      <tr>
                        <td>
                        <form action='?id_hdt= $id_hdt' method='post'>
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
    $url = SITEURL.'admin/harinas_de_trigo.php';
           //funciona bien

            if(isset($_POST['submit'])){
              $nombre = $_POST['nombre'];
              $title = $_POST['title'];
              $description = $_POST['description'];
              $image_name = $_POST['image_name'];


              $query = "INSERT INTO  `harinas_de_trigo`( `name_hdt`, `title_hdt`, `description_hdt`, `image_name_hdt`)  VALUES ('$nombre','$title','$description','$image_name')";

              //Execute the query
              $sql = mysqli_query($cs,$query);
              echo '<script>showAlert();window.setTimeout(function () {HideAlert();},3000);</script>';  echo "<meta http-equiv='refresh' content='0;url= '$url'>";
            }

        //funciona
          if(isset($_POST['delete'])){
            $id_hdt = $_GET['id_hdt'];

            $query = "DELETE FROM harinas_de_trigo WHERE id_hdt=$id_hdt";

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
                $id_hdt = $_GET['id_hdt'];

                //SQL query to get the selected food
                $query = "SELECT * FROM harinas_de_trigo WHERE id_hdt=$id_hdt";

                //execute query
                $sql = mysqli_query($cs,$query);

                //Get the value based on query executed
                $row = mysqli_fetch_assoc($sql);

                //Get the values of the selected harina
                $name_hdt = $row['name_hdt'];
                $title_hdt = $row['title_hdt'];
                $description_hdt = $row['description_hdt'];
                $image_name_hdt = $row['image_name_hdt'];

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

            if(isset($_POST['upha']))
                    {

                         //Get all th details
                        $id_hdt = $_GET['id_hdt'];

                        //echo "Button clicked";
                        //1. Get all the details fro the form
                        $nombre = $_POST['nombre'];
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $image_name = $_POST['image_name'];

                        //4. Update the Food in Database
                        $query2 = "UPDATE `harinas_de_trigo` SET `name_hdt`='$nombre',`title_hdt`='$title',`description_hdt`='$description',`image_name_hdt`='$image_name' WHERE id_hdt = $id_hdt";


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
