<?php
  session_start();

  if(isset($_SESSION['user']))
  {
  ?>
  <!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <?php require_once 'header.php'; ?>
    </body>
  </html>
  <?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>
