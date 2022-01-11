<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $nombre = $_POST['nombre'];

  $sql = "UPDATE categoria SET nombre_categoria='$nombre' WHERE id_categoria='$id'";
  $result = mysqli_query($con, $sql);

  echo $result;

?>
