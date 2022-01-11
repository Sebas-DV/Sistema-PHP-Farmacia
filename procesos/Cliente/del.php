<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];

  $sql = "DELETE FROM cliente WHERE id_cliente='$id'";
  $query = mysqli_query($con, $sql);

  echo $query;
?>
