<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $estado = $_POST['estado'];
  $ruc = $_POST['ruc'];

  $query ="UPDATE proveedor SET nombre_proveedor='$nombre', direccion_proveedor='$direccion', telefono_proveedor='$telefono', estado_proveedor='$estado', ruc_proveedor='$ruc'
          WHERE id_proveedor='$id'";

  $result = mysqli_query($con, $query);

  echo $result;
?>
