<div class="form-reg">
  <hr>
  <h3>Categorias Registradas</h3>
  <hr>
</div>
<div class="datos-reg">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">CATEGORIA</th>
        <th scope="col">EDITAR</th>
        <th scope="col">ELIMINAR</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once '../../clases/conexion.php';

      $query = mysqli_query($con, "SELECT * FROM categoria");

      if(mysqli_num_rows($query) > 0)
      {
        while($array = mysqli_fetch_array($query))
        {
          $datos_array = $array[0]."||".$array[1];
      ?>
        <tr>
          <th scope="row"><?php echo $array[0]; ?></th>
          <td><?php echo $array[1]; ?></td>
          <td><button type="button"class="btn btn-success" data-toggle="modal" data-target="#modal"  onclick="mostrarDatos('<?php echo $datos_array; ?>')"><i class="fa fa-edit"></i> Editar</button></td>
          <td><button type="button" class="btn btn-danger" data-toggle="modal" onclick="alertaSeguridad('<?php echo $array[0]; ?>')" ><i class="fa fa-trash" ></i> Eliminar</button></td>
        </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>
