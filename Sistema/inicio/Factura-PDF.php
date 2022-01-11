<?php
  require_once '../procesos/PDF/factura.php';
  require_once '../clases/conexion.php';

  //if(isset($_SESSION['user']))
  //{
    while (ob_get_level())
    ob_end_clean();
    header("Content-Encoding: None", true);

    $id = $_REQUEST['id'];

    $query = "SELECT f.id_factura, f.fecha, c.nombre_cliente, c.apellido_cliente,c.cedula_cliente,c.direccion_cliente,c.telefono_cliente,
                      p.nombre_producto,cat.nombre_categoria ,pro.nombre_proveedor, p.precio
                      FROM factura f
                      INNER JOIN cliente c ON f.id_cliente = c.id_cliente
                      INNER JOIN producto p ON f.id_producto = p.id_producto
                      INNER JOIN categoria cat ON p.id_categoria = cat.id_categoria
                      INNER JOIN proveedor pro ON p.id_proveedor = pro.id_proveedor
                      WHERE f.id_factura = '$id'";

    $resultado = mysqli_query($con, $query);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);

    while($row = $resultado->fetch_assoc())
    {
      $texto1="Cliente: ".$row['nombre_cliente']." ".$row['apellido_cliente']."\nDireccion: ".$row['direccion_cliente']."\nCEDULA: ".$row['cedula_cliente'];
      $pdf->SetXY(25, 50);
      $pdf->MultiCell(90,10,$texto1,1,"L");

      $texto2="Factura Numero:".$row['id_factura']." de fecha: ".$row['fecha'];
      $pdf->SetXY(25, 90);
      $pdf->Cell(150,10,$texto2,1,0,"C");

      $pdf->SetXY(40, 120);
      $pdf->SetFillColor(255,0,0);
      $pdf->SetTextColor(0,255,255);
      $pdf->Cell(80,10,"Articulo",1,0,"C",true);
      $pdf->Cell(30,10,"Cantidad.",1,0,"C",true);
      $pdf->Cell(20,10,"Precio/U.",1,0,"C",true);
      $pdf->Cell(30,10,"SubTotal.",1,1,"C",true);
      $total=0;

      $pdf->SetTextColor(0,0,0);

      $pdf->SetX(40);
      $pdf->Cell(80,10,$row['nombre_producto'],1,0,"L");
      $pdf->Cell(30,10,"1",1,0,"C");
      $pdf->Cell(20,10,number_format($row['precio'],2),1,0,"C");
      $pdf->Cell(30,10,number_format($row['precio'],2),1,1,"R");
      $total+=($row['precio']);
    }
    $pdf->SetX(120);
    $pdf->Cell(50,10,"Subtotal:",1,0,"C");
    $pdf->Cell(30,10,number_format($total,2),1,1,"R");
    $pdf->SetX(120);
    $pdf->Cell(50,10,"IVA (4%): ",1,0,"C");
    $pdf->Cell(30,10,number_format(0.04*$total,2),1,1,"R");
    $pdf->SetX(120);
    $pdf->Cell(50,10,"Total:",1,0,"C");
    $pdf->Cell(30,10,number_format(1.04*$total,2),1,1,"R");

    $pdf->Output();
  //}
  //else
  //{
    //header('Location: ../index.php');
  //}
?>
