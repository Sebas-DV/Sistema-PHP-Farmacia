<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['cedula'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];

  $sql = "UPDATE cliente SET nombre_cliente='$nombre', apellido_cliente='$apellido', cedula_cliente='$cedula', direccion_cliente='$direccion', telefono_cliente='$telefono' WHERE id_cliente='$id'";
  $query = mysqli_query($con, $sql);

  echo $query;
?>
