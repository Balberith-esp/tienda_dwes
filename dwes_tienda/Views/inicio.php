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
	  <link rel="stylesheet" href="../Estilos/bootstrap/css/inicio.css">
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
          if($_SESSION['logueado']['inicio']){
            
            echo "<script>
                      $(function () { 
                        toastr.info('Bienvenido ".$_SESSION['logueado']['nombre']."');
                      });
                </script></script>";
            $_SESSION['logueado']['inicio'] = false;
          }
        }else{
          header("Location: login.php");
        }

        if(isset($_POST['nuevoItemCesta'])){
          
          $idArticulo = $_POST['idArticulo'];

          $articulo = BaseDatos::getInstance()->devuelveArticulo($idArticulo);

          if(isset($_SESSION['cesta']) and $_SESSION['cesta'] != []){

            $nuevo = true;
            for ($i=0; $i < sizeof($_SESSION['cesta']) ; $i++) { 
              if ($articulo['id'] ==  $_SESSION['cesta'][$i]['id']) {
                $nuevo = false;              
                $_SESSION['cesta'][$i]['cantidad']++;
              }
            }
            if($nuevo){
              $_SESSION['cesta'][] = $articulo;
            }
        }else{

            $_SESSION['cesta'][] = $articulo;

        }    
        echo "<script>
                $(function () { 
                  toastr.success('Tu disco ".$articulo['titulo']." se ha añadido a la cesta');
                });
            </script>";      
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
        <!-- <li class="nav-item active">
          <a class="nav-link" href="nuevoDisco.php">Añadir articulo</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#"> AdministracionUsuarios</a>
        </li> -->
        <li class="nav-item active">
        <a class="nav-link" href="perfil.php">Perfil</a>
        </li>
        <?php 

            if (isset($_SESSION['logueado'])) {

              //A la hora de comprobar el tipo no coge nada si es admin
                if ($_SESSION['logueado']['admin']) {
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

          <a class="nav-link active" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
          <a class="nav-link active" href="carrito.php"><i class="fas fa-shopping-cart fa-lg" ></i></a>
    
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>

<br>
      
    <?php
      
   
    $data = BaseDatos::getInstance()->consultaDiscos();
        foreach($data as $key => $value){
            echo" <form action='#' method='post'>   
            <input type='hidden' name = 'idArticulo' value='".$value['id']."'>
            <input type='hidden' id='articuloCompleto_".$value['id']."' value='".implode(',',$value)."'>
                    <div class='flip-card'>
                        <div class='flip-card-inner'>
                                <div class='flip-card-front'>
                                    <img src='../Resources/img/".$value['caratula']."' alt='".$value['titulo']."' style='width:250px;height:250px;'>
                                </div>
                                    <div class='flip-card-back'>
                                        <h1>".$value['autor']."</h1> 
                                        <p>".$value['titulo']."</p>
                                        <p>".$value['genero']."</p> 
                                        <p>".$value['precio']."€</p>
                                        <button  type='submit' name='nuevoItemCesta' class='btn btn-success'>Compar</button>
                                        <button  type='button' onclick='despliegaModal(".$value['id'].")' class='btn btn-success'>Detalles</button>
                                    </div>
                        </div>
                    </div>
                  </form>";   
        }
    
    ?>


</body>
</html>