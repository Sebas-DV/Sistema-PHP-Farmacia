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
    <script src="../js/clientes.js"></script>
    <body>
      <?php require_once 'header.php'; ?>

      <div class="container">
        <div class="container-fluid">
          <div class="content row">
    			<div class="col-md-4">
            <div class="form-reg">
              <hr>
              <h3>Registro De Clientes</h3>
              <hr>
            </div>
            <div class="formulario">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input id="nombre" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido</label>
                  <input id="apellido" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Apellido">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cedula</label>
                  <input id="cedula" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Cedula">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Direccion</label>
                  <input id="direccion" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Direccion">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telefono</label>
                  <input id="telefono" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Telefono">
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
                    <input type="text" id="id" name="" value="" hidden>
                    <label for="exampleInputEmail1">Nombre</label>
                    <input id="nombreM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Apellido</label>
                    <input id="apellidoM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Apellido">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cedula</label>
                    <input id="cedulaM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Cedula">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Direccion</label>
                    <input id="direccionM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Direccion">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input id="telefonoM" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Telefono">
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

    $('#tabla-datos').load('../procesos/Cliente/table.php');

    $(document).ready(function(){
      $('#btn-regisrar').click(function(){
        regCliente();
      });
      $('#btn-actualizar').click(function(){
        actCliente();
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
