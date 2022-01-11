function mostrarDatos(datos)
{
  array = datos.split("||");

  $('#id').val(array[0]);
  $('#nombreM').val(array[1]);
  $('#apellidoM').val(array[2]);
  $('#cedulaM').val(array[3]);
  $('#direccionM').val(array[4]);
  $('#telefonoM').val(array[5]);
}

function regCliente()
{
  nombre = $('#nombre').val();
  apellido = $('#apellido').val();
  cedula = $('#cedula').val();
  direccion = $('#direccion').val();
  telefono = $('#telefono').val();

  if(nombre == '' || apellido == '' || cedula == '' || direccion == '' || telefono == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena = "nombre=" + nombre + "&apellido=" + apellido + "&cedula=" + cedula +
             "&direccion=" + direccion + "&telefono=" + telefono;
    $.ajax({
      type:"POST",
      url:"../procesos/Cliente/reg-cliente.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          $('#tabla-datos').load('../procesos/Cliente/table.php');
          alertify.success("Se registro exitosamente");
        }
        else {
          alertify.error("Error no se registro :(");
        }
      }
    });
  }
}

function actCliente()
{
  id = $('#id').val();
  nombre = $('#nombreM').val();
  apellido = $('#apellidoM').val();
  cedula = $('#cedulaM').val();
  direccion = $('#direccionM').val();
  telefono = $('#telefonoM').val();

  if(nombre == '' || apellido == '' || cedula == '' || direccion == '' || telefono == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena = "id=" + id + "&nombre=" + nombre + "&apellido=" + apellido + "&cedula=" + cedula +
             "&direccion=" + direccion + "&telefono=" + telefono;

    $.ajax({
      type:"POST",
      url:"../procesos/Cliente/act.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          $('#tabla-datos').load('../procesos/Cliente/table.php');
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
    delCliente(id)
  }
  ,function(){
    alertify.error("Se cancelo la operacion")
  });
}

function delCliente(id)
{
  cadena = "id=" + id;

  $.ajax({
    type:"POST",
    url:"../procesos/Cliente/del.php",
    data: cadena,
    success:function(r){
      if(r==1)
      {
        $('#tabla-datos').load('../procesos/Cliente/table.php');
        alertify.success("Se elimino exitosamente");
      }
      else {
        alertify.error("Error no se elimino :(");
      }
    }
  });
}
