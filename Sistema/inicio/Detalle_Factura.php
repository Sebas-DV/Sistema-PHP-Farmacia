<?php
  session_start();

  require_once '../clases/conexion.php';
  if (isset($_SESSION['user']))
  {
  ?>
  <!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <script src="../js/facturadora.js"></script>
    <body>
      <?php require_once 'header.php';?>
      <div class="container">
        <div class="form-reg">
          <hr>
          <h3>Detalles de Factura</h3>
          <hr>
        </div>
        <div class="table">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">FECHA</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">PRODUCTO</th>
                <th scope="col">ACCION</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = mysqli_query($con, "SELECT f.id_factura, f.fecha, c.nombre_cliente, c.apellido_cliente,p.nombre_producto
                                             FROM factura f
                                             INNER JOIN cliente c ON f.id_cliente = c.id_cliente
                                             INNER JOIN producto p ON f.id_producto = p.id_producto");

                if(mysqli_num_rows($query) > 0)
                {
                  while($array = mysqli_fetch_array($query))
                  {
              ?>
              <tr>
                <th scope="row"><?php echo $array[0]; ?></th>
                <td><?php echo $array[1]; ?></td>
                <td><?php echo $array[2]." ".$array[3]; ?></td>
                <td><?php echo $array[4];?></td>
                <td>
                  <a class="btn btn-success" href="Factura-PDF.php?id=<?php echo $array[0]; ?>"><i class="fas fa-align-justify"></i> Ver Factura</a>
                </td>
              </tr>
              <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </body>
</html>
</html>
<script type="text/javascript">
  });
</script>
<?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>
