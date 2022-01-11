<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $categoria = $_POST['categoria'];
  $proveedor = $_POST['proveedor'];
  $cantidad = $_POST['cantidad'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];

  $sql = "UPDATE producto SET id_categoria='$categoria', id_proveedor='$proveedor', nombre_producto='$nombre', inventario_producto='$cantidad',
                              descripcion1='$descripcion', precio='$precio' WHERE id_producto='$id'";

  $query = mysqli_query($con, $sql);

echo $query;
?>
