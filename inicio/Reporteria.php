<?php
  require_once '../procesos/Reporteria/repoteria.php';
  require_once '../clases/conexion.php';

  //if(isset($_SESSION['user']))
  //{
    while (ob_get_level())
    ob_end_clean();
    header("Content-Encoding: None", true);

    $query = "SELECT f.id_factura, f.fecha, c.nombre_cliente, c.apellido_cliente,p.nombre_producto,cat.nombre_categoria, p.precio
              FROM factura f
              INNER JOIN cliente c ON f.id_cliente = c.id_cliente
              INNER JOIN producto p ON f.id_producto = p.id_producto
              INNER JOIN categoria cat ON p.id_categoria = cat.id_categoria
              INNER JOIN proveedor pro ON p.id_proveedor = pro.id_proveedor";

    $resultado = mysqli_query($con, $query);

     $pdf = new PDF();
     $pdf->AliasNbPages();
     $pdf->AddPage();

     $pdf->SetFillColor(232,232,232);
     $pdf->SetFont('Arial', 'B', 12);
     $pdf->Cell(60,6,'NOMBRE CLIENTE',1,0,'C',1);
     $pdf->Cell(60,6,'FECHA',1,0,'C',1);
     $pdf->Cell(30,6,'PRODUCTO',1,0,'C',1);
     $pdf->Cell(30,6,'TOTAL',1,0,'C',1);

     $pdf->SetFont('Arial', '', 10);

     while($row = $resultado->fetch_assoc())
     {
       $pdf->Ln();
       $pdf->Cell(60,6,$row['nombre_cliente'].$row['apellido_cliente'], 1,0,'C',1);
       $pdf->Cell(60,6,$row['fecha'], 1,0,'C',1);
       $pdf->Cell(30,6,$row['nombre_producto'], 1,0,'C',1);
       $pdf->Cell(30,6,$row['precio'], 1,0,'C',1);
     }
     $pdf->Output();
  //}
  //else
  //{
    //header('Location: ../index.php');
  //}
?>
