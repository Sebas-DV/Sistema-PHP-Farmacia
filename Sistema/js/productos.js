function mostrarDatos(datos)
{
  array = datos.split("||");

  $('#id').val(array[0]);
  $('#nombreM').val(array[3]);
  $('#cantidadM').val(array[4]);
  $('#descripcionM').val(array[5]);
  $('#precioM').val(array[6]);
}

function regProducto()
{
  nombre = $('#nombre').val();
  categoria = $('#categoria').val();
  proveedor = $('#proveedor').val();
  cantidad = $('#cantidad').val();
  descripcion = $('#descripcion').val();
  precio = $('#precio').val();

  if(nombre == '' || categoria == '' || proveedor == '' || cantidad == '' || descripcion == '' || precio == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena = "categoria=" + categoria + "&proveedor=" + proveedor + "&nombre=" + nombre +
             "&cantidad=" + cantidad + "&descripcion=" + descripcion + "&precio=" + precio;
    $.ajax({
      type:"POST",
      url:"../procesos/Productos/reg-producto.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          $('#tabla-datos').load('../procesos/Productos/table.php');
          alertify.success("Se registro exitosamente");
        }
        else {
          alertify.error("Error no se registro :(");
        }
      }
    });
  }
}

function actProducto()
{
  id = $('#id').val(),
  nombre = $('#nombreM').val();
  categoria = $('#categoriaM').val();
  proveedor = $('#proveedorM').val();
  cantidad = $('#cantidadM').val();
  descripcion = $('#descripcionM').val();
  precio = $('#precioM').val();

  if(nombre == '' || categoria == '' || proveedor == '' || cantidad == '' || descripcion == '' || precio == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena = "id=" + id + "&categoria=" + categoria + "&proveedor=" + proveedor + "&nombre=" + nombre +
             "&cantidad=" + cantidad + "&descripcion=" + descripcion + "&precio=" + precio;
    $.ajax({
      type:"POST",
      url:"../procesos/Productos/act.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          $('#tabla-datos').load('../procesos/Productos/table.php');
          alertify.success("Se registro exitosamente");
        }
        else {
          alertify.error("Error no se registro :(");
        }
      }
    });
  }
}
function alertaSeguridad(id) {
  alertify.confirm('Eliminar Datos', '¿ Desea eliminar el registro seleccionado ?',
  function(){
    delProducto(id)
  }
  ,function(){
    alertify.error("Se cancelo la operacion")
  });
}

function delProducto(id)
{
  cadena = "id=" + id;

  $.ajax({
    type:"POST",
    url:"../procesos/Productos/del.php",
    data: cadena,
    success:function(r){
      if(r==1)
      {
        $('#tabla-datos').load('../procesos/Productos/table.php');
        alertify.success("Se elimino exitosamente");
      }
      else {
        alertify.error("Error no se elimino :(");
      }
    }
  });
}
