<html>
<body>

nombre <?php echo $_POST["name_hdt"]; ?><br>
tipe <?php echo $_POST["type_hdt"]; ?><br>

<?php

  $cs=mysqli_connect("localhost","root","");
  $cbd=mysqli_select_db($cs,"pirineos_website");

  $id = 1;
  $name = $_POST["name_hdt"];
  $type = $_POST["type_hdt"];
  $tittle = $_POST["tittle_hdt"];
  $description = $_POST["description_hdt"];
  $image = $_POST["images_name_hdt"];
  echo $name, $type, $tittle, $description, $image;

  $query="INSERT INTO `harinas_de_trigo`(`id_hdt`, `name_hdt`, `tittle_hdt`, `description_hdt`, `image_name_hdt`, `type_hdt`) VALUES ('$id', '$name', '$tittle', '$description', '$image', '$type')";
  $sql=mysqli_query($cs,$query);

?>


</body>
</html>
