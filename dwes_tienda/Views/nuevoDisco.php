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

    <title>Registro</title>
    <?php 
    require_once '../Resources/PHP/funciones.php';
        if(isset($_POST['submit'])){
            $path = "../Resources/img/";
            $titulo=$_POST['titulo'];
            $autor=$_POST['autor'];
            $genero=$_POST['genero'];
            $precio=$_POST['precio'];

            move_uploaded_file($_FILES['caratula']['tmp_name'], $path.$_FILES["caratula"]['name']);

            nuevoDisco($titulo,$autor, $genero,$precio, $_FILES["caratula"]['name']);
        }
        session_start();
           
        if (isset($_SESSION['logueado'])) {
           
          //A la hora de comprobar el tipo no coge nada si es admin
            if (!$_SESSION['logueado']['admin']) {
                header("Location: inicio.php");
            }
    
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
<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Agregar Disco</h4>
              
            </div>
          
            <div class="modal-body">
              
            
                <form enctype="multipart/form-data"  method="POST" action="#">
<!---form--->           <div class="form-group">
<!---input width--->    <div class="col-xs-6">
                        <label for="InputName">Titulo</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="titulo" placeholder="Titulo..." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        <br>
                        <label for="InputName">Autor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="autor" placeholder="Autor..." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
<!--------------------------------------separator---------------------------------------------------------------> <hr>
                </div>
                </div>
                    <div class="form-group">
                    <div class="col-xs-6">

                        <label>Genero</label>
                        <div class="input-group">
                        <select name="genero">
                            <option value="rock">rock</option>
                            <option value="rap">rap</option>
                            <option value="jazz">jazz</option>

                        </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    
                     </div>
                 </div>

                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputStreetName">Precio</label>
                        <div class="input-group">
                        <input type="number" class="form-control" name="precio" placeholder="Precio.." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
<!----------------------------break-------------------------------------------------------------> 
                    </div>                     
                </div>
             
                  

                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputProvince">Caratula</label>
                        <div class="input-group">
                        <input type="file" class="form-control" name="caratula" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span> 
                    </div>
<!----------------------------break-------------------------------------------------------------> <br>                     
                   </div>
                </div>

                  <div class="form-group">
                  <div class="input-group-addon">
                  <input type="submit" name="submit" id="submit" value="Registro" class="btn btn-success pull-right">
                  <a class="btn btn-info" href="inicio.php" role="button">Volver</a>

                  </div>
                </div>
                </form>
              </div><!---modal-body--->
          </div>
       </div>
</body>
</html>