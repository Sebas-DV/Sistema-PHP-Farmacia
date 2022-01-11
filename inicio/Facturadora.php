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
          <h3>Facturadora</h3>
          <hr>
        </div>
        <div class="tabla-user">
          <div class="row">
            <div class="col-md-12">
              <form class="form-inline">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="c-t">Cliente: </label>
                  <div class="form-group">
                    <?php $query = mysqli_query($con, "SELECT * FROM cliente"); ?>
                    <select  id="cliente" class="form-control buscar" >
                      <option selected>Cliente</option>
                      <?php
                      if(mysqli_num_rows($query) > 0)
                      {
                        while ($array = mysqli_fetch_array($query))
                        {
                          $array_datos = $array[0]."||". $array[1];
                          ?>
                          <option value="<?php echo $array[0]; ?>"><?php echo $array[1]." ". $array[2]; ?></option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </form>
              <hr>
            </div>
          </div>
          <div class="tables">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Producto</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Accion</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="form-group">
                      <?php $query = mysqli_query($con, "SELECT * FROM producto"); ?>
                      <select  id="producto" class="form-control" >
                        <option selected>Categoria</option>
                        <?php
                        if(mysqli_num_rows($query) > 0)
                        {
                          while ($array = mysqli_fetch_array($query))
                          {
                            ?>
                            <option value="<?php echo $array[0]; ?>"><?php echo $array[3]." | ". $array[5]; ?></option>
                            <?php
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </td>
                  <td>
                    <input id="fecha" type="date" class="form-control" aria-describedby="emailHelp" placeholder="Apellido">
                    <input type="text" name="" value="<?php echo $_SESSION['id']; ?>" hidden id="id_user">
                  </td>
                  <td><button type="button" class="btn btn-success" id="reg">Registrar</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </body>
</html>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#reg').click(function(){
      regFactura();
    });
  });
</script>
<?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>
