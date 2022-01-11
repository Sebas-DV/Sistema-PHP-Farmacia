function mostrarDatos(datos)
{
  array = datos.split("||");

  $('#id').val(array[0]);
  $('#nombreM').val(array[1]);
}

function regCategoria()
{
  nombre = $('#nombre').val();

  if(nombre == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena = "nombre=" + nombre;
    $.ajax({
      type:"POST",
      url:"../procesos/Categoria/reg-categoria.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          $('#tabla-datos').load('../procesos/Categoria/table.php');
          alertify.success("Se registro exitosamente");
        }
        else {
          alertify.error("Error no se registro :(");
        }
      }
    });
  }
}

function actCategoria()
{
  id = $('#id').val();
  nombre = $('#nombreM').val();

  if(nombre == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena = "id=" + id + "&nombre=" + nombre;

    $.ajax({
      type:"POST",
      url:"../procesos/Categoria/act.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          $('#tabla-datos').load('../procesos/Categoria/table.php');
          alertify.success("Se actualizo exitosamente");
        }
        else {
          alertify.error("Error no se actualizo :(");
        }
      }
    });
  }
}

function alertaSeguridad(id) {
  alertify.confirm('Eliminar Datos', '¿ Desea eliminar el registro seleccionado ?',
  function(){
    delCategoria(id)
  }
  ,function(){
    alertify.error("Se cancelo la operacion")
  });
}

function delCategoria(id)
{
  cadena = "id=" + id;

  $.ajax({
    type:"POST",
    url:"../procesos/Categoria/del.php",
    data: cadena,
    success:function(r){
      if(r==1)
      {
        $('#tabla-datos').load('../procesos/Categoria/table.php');
        alertify.success("Se elimino exitosamente");
      }
      else {
        alertify.error("Error no se elimino :(");
      }
    }
  });
}
