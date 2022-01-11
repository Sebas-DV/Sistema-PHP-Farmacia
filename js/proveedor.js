function mostrarDatos(datos)
{
  array = datos.split("||");

  $('#id').val(array[0]);
  $('#nombreM').val(array[1]);
  $('#direccionM').val(array[2]);
  $('#telefonoM').val(array[3]);
  $('#estadoM').val(array[4]);
  $('#rucM').val(array[5]);
}

function regProveedor()
{
  nombre = $('#nombre').val();
  direccion = $('#direccion').val();
  telefono = $('#telefono').val();
  estado = $('#estado').val();
  ruc = $('#ruc').val();

  if(nombre == '' || direccion == '' || telefono == '' || estado == '' || ruc == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena = "nombre=" + nombre + "&direccion=" + direccion + "&telefono=" + telefono +
             "&estado=" + estado + "&ruc=" + ruc;
    $.ajax({
      type:"POST",
      url:"../procesos/Proveedor/reg-proveedor.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          $('#tabla-datos').load('../procesos/Proveedor/tabla.php');
          alertify.success("Se registro exitosamente");
        }
        else {
          alertify.error("Error no se registro :(");
        }
      }
    });
  }
}

function actProveedor()
{
  id = $('#id').val();
  nombre = $('#nombreM').val();
  direccion = $('#direccionM').val();
  telefono = $('#telefonoM').val();
  estado = $('#estadoM').val();
  ruc = $('#rucM').val();

  if(nombre == '' || direccion == '' || telefono == '' || estado == '' || ruc == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena = "id=" + id + "&nombre=" + nombre + "&direccion=" + direccion + "&telefono=" + telefono +
             "&estado=" + estado + "&ruc=" + ruc;

    $.ajax({
      type:"POST",
      url:"../procesos/Proveedor/act.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          $('#tabla-datos').load('../procesos/Proveedor/tabla.php');
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
    delProveedor(id)
  }
  ,function(){
    alertify.error("Se cancelo la operacion")
  });
}

function delProveedor(id)
{
  cadena = "id=" + id;

  $.ajax({
    type:"POST",
    url:"../procesos/Proveedor/del.php",
    data: cadena,
    success:function(r){
      if(r==1)
      {
        $('#tabla-datos').load('../procesos/Proveedor/tabla.php');
        alertify.success("Se elimino exitosamente");
      }
      else {
        alertify.error("Error no se elimino :(");
      }
    }
  });
}
