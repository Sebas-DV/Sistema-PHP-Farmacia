<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];

  $query = "DELETE FROM proveedor WHERE id_proveedor='$id'";
  $result = mysqli_query($con, $query);

  echo $result;
?>
