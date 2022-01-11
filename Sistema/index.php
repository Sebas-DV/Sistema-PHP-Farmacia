<?php
    include_once 'procesos/Login/login-user.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
  </head>
  <body>
    <div class="container">
    	<div id="login-box">
    		<div class="logo">
    			<h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
    		</div>
    		<div class="controls">
          <form class="" action="" method="post">
      			<input type="text" name="username" placeholder="Nombre de Usuario" class="form-control" />
      			<input type="text" name="password" placeholder="Contraseña" class="form-control" />
      			<button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
          </form>
          <br>
          <div class="user-info">
            <p><?php echo isset($alert) ? $alert : ''; ?></p>
          </div>
    		</div>
    	</div>
    </div>
    <div id="particles-js"></div>
  </body>
</html>
