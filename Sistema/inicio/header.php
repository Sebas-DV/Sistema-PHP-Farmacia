<?php require_once 'links.php'; ?>

<div class="container">
  <div class="container-fluid header">
    <header>
    <h3><i class="fas fa-store"></i> Ventas de Farmacia</h3>
		</header>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Productos.php"><i class="fas fa-box"></i> Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Proveedor.php"><i class="fas fa-users"></i> Proveedores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Categoria.php"><i class="fas fa-notes-medical"></i> Categoria</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Clientes.php"><i class="fas fa-user-friends"></i> Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Facturadora.php"><i class="fas fa-align-justify"></i> Ventas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Detalle_Factura.php"><i class="fas fa-newspaper"></i>Factura</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Reporteria.php"><i class="fas fa-chart-line"></i> Reporteria</a>
            </li>

          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-info"><i class="far fa-circle"></i> Usuario: <?php echo $_SESSION['user']; ?></button>
            <a id="btn-exit" class="btn btn-danger" href="../clases/exit.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
          </form>
        </div>
    </nav>
</div>
