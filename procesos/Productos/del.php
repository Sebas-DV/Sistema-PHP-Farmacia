<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];

  $sql = "DELETE FROM producto WHERE id_producto='$id'";
  $query = mysqli_query($con, $sql);

  echo $query;
?>
