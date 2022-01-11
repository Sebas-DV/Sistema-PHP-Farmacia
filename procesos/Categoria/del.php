<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];

  $sql = "DELETE FROM categoria WHERE id_categoria='$id'";
  $query = mysqli_query($con, $sql);

  echo $query;
?>
