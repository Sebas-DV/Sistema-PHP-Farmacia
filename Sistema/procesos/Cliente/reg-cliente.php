<?php
  require_once '../../clases/conexion.php';

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['cedula'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];

  $sql = "INSERT INTO cliente(nombre_cliente, apellido_cliente, cedula_cliente, direccion_cliente, telefono_cliente)
          VALUES('$nombre','$apellido','$cedula','$direccion','$telefono')";
  $query = mysqli_query($con, $sql);

  echo $query;
?>
