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
    <script src="../js/productos.js"></script>
    <body>
      <?php require_once 'header.php'; ?>

      <div class="container">
        <div class="container-fluid">
          <div class="content row">
    			<div class="col-md-4">
            <div class="form-reg">
              <hr>
              <h3>Registro De Productos</h3>
              <hr>
            </div>
            <div class="formulario">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input id="nombre" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre del Producto">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Categoria</label>
                  <?php $query = mysqli_query($con, "SELECT * FROM categoria"); ?>
                  <select  id="categoria" class="form-control" >
                    <option selected>Categoria</option>
                    <?php
                    if(mysqli_num_rows($query) > 0)
                    {
                      while ($array = mysqli_fetch_array($query))
                      {
                        ?>
                        <option value="<?php echo $array[0]; ?>"><?php echo $array[1]; ?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Proveedor</label>
                  <?php $query = mysqli_query($con, "SELECT * FROM proveedor"); ?>
                  <select  id="proveedor" class="form-control" >
                    <option selected>Proveedor</option>
                    <?php
                    if(mysqli_num_rows($query) > 0)
                    {
                      while ($array = mysqli_fetch_array($query))
                      {
                        ?>
                        <option value="<?php echo $array[0]; ?>"><?php echo $array[1]; ?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cantidad en Inventario</label>
                  <input id="cantidad" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Cantidad en Inventario">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Descripcion</label>
                  <input id="descripcion" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Descripcion">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Precio</label>
                  <input id="precio" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Precio">
                </div>
                <button type="button" id="btn-regisrar" class="btn btn-primary btn-lg btn-block">Registrar</button>
              </form>
            </div>
          </div>
    			<div class="col-md-8 text-center">
            <div id="tabla-datos"></div>
          </div>
          </div>
        </div>
        <div class="modal fade" id="modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Actualizacion de Datos</h4>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Close</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <input type="text" name="" value="" id="id" hidden>
                    <label for="exampleInputEmail1">Nombre</label>
                    <input id="nombreM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre del Producto">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria</label>
                    <small id="emailHelp" class="form-text text-muted">*Obligatorio</small>
                    <?php $query = mysqli_query($con, "SELECT * FROM categoria"); ?>
                    <select  id="categoriaM" class="form-control" >
                      <option selected>Categoria</option>
                      <?php
                      if(mysqli_num_rows($query) > 0)
                      {
                        while ($array = mysqli_fetch_array($query))
                        {
                          ?>
                          <option value="<?php echo $array[0]; ?>"><?php echo $array[1]; ?></option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Proveedor</label>
                    <small id="emailHelp" class="form-text text-muted">*Obligatorio</small>
                    <?php $query = mysqli_query($con, "SELECT * FROM proveedor"); ?>
                    <select  id="proveedorM" class="form-control" >
                      <option selected>Proveedor</option>
                      <?php
                      if(mysqli_num_rows($query) > 0)
                      {
                        while ($array = mysqli_fetch_array($query))
                        {
                          ?>
                          <option value="<?php echo $array[0]; ?>"><?php echo $array[1]; ?></option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cantidad en Inventario</label>
                    <input id="cantidadM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Cantidad en Inventario">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion</label>
                    <input id="descripcionM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Descripcion">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Precio</label>
                    <input id="precioM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Precio">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
                <button type="button" data-dismiss="modal" class="btn btn-outline-primary" id="btn-actualizar" onclick=""><i class="fa fa-save" ></i> Guardar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
  <script type="text/javascript">

    $('#tabla-datos').load('../procesos/Productos/table.php');

    $(document).ready(function(){
      $('#btn-regisrar').click(function(){
        regProducto();
      });
      $('#btn-actualizar').click(function(){
        actProducto();
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
