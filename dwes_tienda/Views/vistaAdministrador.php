<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import de jquery y JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../Resources/JS/funciones.js"></script>

    <!-- Imports de boostrap e iconos-->
    <link rel="stylesheet" href="../Estilos/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" href="../Estilos/bootstrap/css/vistaAdmin.css">
    <script defer src="../Estilos/icons/js/all.js"></script>

	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>

  <?php 
    /*Comprobar si el usuario esta logeado*/
        
        require_once '../Class/BaseDatos.php';
        
        session_start();
        if(isset($_SESSION['logueado'])){
          if(!isset($_SESSION['primeraVisita'])){
            echo "<script>
                      $(function () { 
                        toastr.info('Bienvenido ".$_SESSION['logueado']->getNombre()."');
                      });
                    </script>";
            $_SESSION['primeraVisita']=true;
          }
          // }
        }else{
          header("Location: login.php");
        }
  ?>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" 
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="vistaAdministrador.php"><img src='../Resources/img/logo.png' alt='logo' style='width:50px;height:50px;'></a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="vistaAdministrador.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="nuevoDisco.php">Nuevo Articulo <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="administrador.php">Datos <span class="sr-only">(current)</span></a>
        </li>
      </ul>

          <a class="nav-link active" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
          <a class="nav-link active" href="carrito.php"><i class="fas fa-shopping-cart fa-lg" ></i></a>
    
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
<br>

  <div class="container">
    <div class="row">
    <div class="col-sm">
      <div class="col-md-6 quarter">
      <a class="nav-link" href="administrador.php">
       <i class="fas fa-database fa-10x"style="color:green;"></i><hr>
        <h5>Database</h5></a>
      </div>
    </div>
    <div class="col-sm">
    <div class="col-md-6 quarter">
    <a  class="nav-link" href="nuevoDisco.php">
      <i class="fas fa-compact-disc fa-10x"style="color:green;"></i><hr>
        <h5>Añadir articulos</h5></a>
      </div>    </div>
    <div class="col-sm">
    <div class="col-md-6 quarter">
      <a  class="nav-link" href="registro.php">
      <i class="fas fa-user-plus fa-10x"style="color:green;"></i><hr>
        <h5>Añadir Usuarios</h5></a>
      </div>    </div>
  </div>
</div>


</body>
</html>