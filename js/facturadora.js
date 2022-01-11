function regFactura()
{
  id_user = $('#id_user').val();
  cliente = $('#cliente').val();
  producto = $('#producto').val();
  fecha = $('#fecha').val();

  if(cliente == '' || producto == '' || fecha == '')
  {
    alertify.alert('Advertencia de Seguridad', 'Rellene todos los campos e intente de nuevo.');
  }
  else
  {
    cadena ="id_user=" + id_user + "&cliente=" + cliente + "&producto=" + producto + "&fecha=" + fecha;
    $.ajax({
      type:"POST",
      url:"../procesos/Facturadora/reg-factura.php",
      data: cadena,
      success:function(r){
        if(r==1)
        {
          alertify.success("Se registro exitosamente");
        }
        else {
          alertify.error("Error no se registro :(");
        }
      }
    });
  }
}
