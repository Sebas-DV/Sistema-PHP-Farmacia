<?php
  require_once '../../clases/conexion.php';

  $nombre = $_POST['nombre'];

  $sql = "INSERT INTO categoria (nombre_categoria) VALUES ('$nombre')";
  $query = mysqli_query($con, $sql);

  echo $query;
?>
