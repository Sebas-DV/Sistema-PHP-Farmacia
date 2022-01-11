<?php
    require_once '../../clases/conexion.php';

    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $ruc = $_POST['ruc'];

    $sql = "INSERT INTO proveedor (nombre_proveedor, direccion_proveedor, telefono_proveedor, estado_proveedor, ruc_proveedor)
            VALUES('$nombre','$direccion','$telefono','$estado','$ruc')";

    $result = mysqli_query($con, $sql);

    echo $result;
?>
