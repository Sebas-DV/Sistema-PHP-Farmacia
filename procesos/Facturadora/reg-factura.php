<?php
  require_once '../../clases/conexion.php';

  $id_user = $_POST['id_user'];
  $cliente = $_POST['cliente'];
  $producto = $_POST['producto'];
  $fecha = $_POST['fecha'];

  $query = "INSERT INTO factura(id_cliente, id_producto, id_usuario, fecha)
            VALUES('$cliente','$producto','$id_user','$fecha')";
  $sql = mysqli_query($con, $query);

  echo $sql;
?>
