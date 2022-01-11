<?php
    require_once '../../clases/conexion.php';

    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $proveedor = $_POST['proveedor'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO producto (id_categoria, id_proveedor, nombre_producto, inventario_producto, descripcion1, precio)
            VALUES ('$categoria','$proveedor','$nombre','$cantidad','$descripcion','$precio')";

    $query = mysqli_query($con, $sql);

    echo $query;
?>
