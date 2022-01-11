<?php
  session_start();

  require_once 'clases/conexion.php';

  $alert = "";

  if(!empty($_POST))
  {
    if(empty($_POST['username']) || empty($_POST['password']))
    {
      $alert = "Llene todos los campos.";
    }
    else
    {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $_SESSION['user'] = $username;

      $query = mysqli_query($con, "SELECT * FROM login WHERE usuario_descripcion='$username' AND password='$password'");

      if(mysqli_num_rows($query) > 0)
      {
        while($array = mysqli_fetch_array($query))
        {
          $id = $array[0];
          $_SESSION['id'] = $id;
        }
        header('Location: inicio/index.php');
      }
      else
      {
        $alert = "Usuario y/o Contraseña incorrectos.";
      }
    }
  }
?>
