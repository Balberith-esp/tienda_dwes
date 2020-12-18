<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import de jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../Resources/JS/funciones.js"></script>

    <!-- Imports de boostrap e iconos-->
    <link rel="stylesheet" href="../Estilos/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" href="../Estilos/bootstrap/css/inicio.css">
    <link rel="stylesheet" href="../Estilos/bootstrap/css/cesta.css">
    <script defer src="../Estilos/icons/js/all.js"></script>

	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Bootbox (alerts) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script> 
    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>


	
    <title>Carrito</title>

    <?php 
    /*Comprobar si el usuario esta logeado*/
    require_once '../Class/BaseDatos.php';
    session_start();
      if(isset($_SESSION['logueado'])){

      }else{
        header("Location: login.php");
      }
      if(isset($_POST['vaciar'])){
        // echo "<script>bootbox.confirm('Esta seguro que quiere vaciar la cesta?', function(result){ 
        //          if(result){
        //         ".$_SESSION['cesta'] = []."
        //           }
        //      });
        //      </script>";
        $_SESSION['cesta'] = [];
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
      <a class="navbar-brand" href="inicio.php"><img src='../Resources/img/logo.png' alt='logo' style='width:50px;height:50px;'></a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="perfil.php">Perfil</a>
        </li>
        <?php 

        if (isset($_SESSION['logueado'])) {

          //A la hora de comprobar el tipo no coge nada si es admin
            if ($_SESSION['logueado']->isAdmin()) {
              echo "<li class='nav-item active'>
                  <a class='nav-link' href='nuevoDisco.php'>Añadir articulo</a>
                </li>";

              echo "<li class='nav-item active'>
                  <a class='nav-link' href='administrador.php'>Administracion</a>
                </li>";
            }

        }
        ?>
      </ul>
        
        <?php 
            echo '<a class="nav-link active" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>';
        ?>
          
          <a class="nav-link active" href="carrito.php"><i class="fas fa-shopping-cart fa-lg" ></i></a>
    
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
<br>
    <div class="card cesta">
       <div class="card-header" >                    
          <div class='container'>
                      <div class='row'>
                        <div class='col col-lg-2'><h5>Cesta</h5></div>
                        <div class='col'>Titulo</div>
                        <div class='col'>Cantidad</div>
                        <div class='col'>Precio</div>
                      </div>
          </div>
        </div>
       <ul class="list-group list-group-flush">

        <?php 
        if(isset($_SESSION['cesta'])){
          echo "<form action='' method='post'>";

          foreach($_SESSION['cesta'] as $value){
            echo "<li class='list-group-item'>
                    <div class='container'>
                      <div class='row'>
                        <div class='col col-lg-2'><img src='../Resources/img/".$value->getCaratula()."' alt='".$value->getTitulo()."' style='width:50px;height:50px;'></div>
                        <div class='col'>".$value->getTitulo()."</div>
                        <div class='col'><input type='number' id='".$value->getId()."' name='cantidad' min='1' max='25' value='".$value['cantidad']."' ></div>
                        <input type='hidden' value='".$value['precio']."' id='precioUnidad_".$value->getId()."'>
                        <div class='col precios' id='precioTotal_".$value->getId()."' >".$value->getPrecio()*$value->getCantidad()."€</div>
                      </div>
                    </div>
                  </li>";
          }

          echo "<hr>
                <div class='container'>
                  <div class='row'>
                    <div class='col align-self-end' id='subtotal_id'><script> sumaItems(); </script></div>
                    
                  </div>
                </div>
                <br>
                <div class='container'>
                  <div class='row'>
                    <button class='btn btn-outline-success my-2 my-sm-0' type='submit' name='comprar'>Comprar</button>
                    <button class='btn btn-outline-success my-2 my-sm-0' type='submit' name='vaciar'>Vaciar cesta</button>
                  </div>
                </div><br></form>";
        }else{
          echo "<hr>
          <div class='container'>
            <div class='row'>
               <div class='col align-self-end' id='subtotal_id'><script> sumaItems(); </script></div>
            </div>
          </div>
          <br>
          <div class='container'>
            <div class='row'>
              <button class='btn btn-outline-success my-2 my-sm-0' type='submit' name='comprar'>Comprar</button>
              <button class='btn btn-outline-success my-2 my-sm-0' type='submit' name='vaciar'>Vaciar cesta</button>
            </div>
          </div><br>Cesta vacia";
        }
        ?>
      </ul>
    </div>
</body>
</html>