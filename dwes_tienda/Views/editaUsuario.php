<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import de jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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

        }else{
          header("Location: login.php");
        }


        if(isset($_POST['submit'])){
            $nombre=$_POST['nombre'];
            $apellidos=$_POST['apellido'];
            $email=$_POST['email'];
            $telefono=$_POST['telefono'];
            $pais=$_POST['pais'];
            $provincia=$_POST['provincia'];
            $localidad=$_POST['localidad'];
            $calle=$_POST['calle'];
            $detalle=$_POST['detalle'];
            $cp=$_POST['cp'];
            $id = $_SESSION['logueado']->getId();

            if(BaseDatos::getInstance()->editaUsuario($id,$nombre,$apellidos,$email,$telefono,$pais,$provincia,$localidad,$calle,$detalle,$cp)){
                echo "<script>
                $(function () { 
                  toastr.success('Usuario editado correctamente');
                });
            </script>";
            }else{
                echo "<script>
                    $(function () { 
                    toastr.success('No se ha podido editar el usuario');
                    });
                </script>";
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
        <li class="nav-item active">
        <a class="nav-link" href="perfil.php">Perfil</a>
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
  
<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Edite su usuario</h4>
              
            </div>
          
            <div class="modal-body">
              
            
                <form id="registerForm" method="POST" action="#">
<!---form--->           <div class="form-group">
<!---input width--->    <div class="col-xs-6">
                        <label for="InputName">Nombre</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="nombre" value='<?php echo  $_SESSION['logueado']->getNombre();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        <br>
                        <label for="InputName">Apellidos</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="apellido" value='<?php echo  $_SESSION['logueado']->getApellido();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
<!--------------------------------------separator---------------------------------------------------------------> <hr>
                </div>
                </div>
                    <div class="form-group">
                    <div class="col-xs-6">

                        <label for="InputName">Email</label>
                        <div class="input-group">
                        <input type="email" class="form-control" name=email value='<?php echo  $_SESSION['logueado']->getEmail();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    
                        <br>
                        <label>Telefono</label>
                        <div class="input-group">
                        <input type="tel" class="form-control" name="telefono" value='<?php echo  $_SESSION['logueado']->getTelefono();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    
                    </div>
<!----------------------------break-------------------------------------------------------------> 
                     </div>
                 </div>

                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputStreetName">Pais</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="pais" value='<?php echo  $_SESSION['logueado']->getPais();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
<!----------------------------break-------------------------------------------------------------> 
                    </div>                     
                </div>
             
                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputCity">Provincia</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="provincia" value='<?php echo  $_SESSION['logueado']->getProvincia();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><br>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputCity">Localidad</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="localidad" value='<?php echo  $_SESSION['logueado']->getLocalidad();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><br>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputCity">Calle</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="calle" value='<?php echo  $_SESSION['logueado']->getCalle();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><br>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputCity">Detalle</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="detalle" value='<?php echo  $_SESSION['logueado']->getDetalle();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
<!----------------------------break-------------------------------------------------------------> 
                    </div>
                    </div>

                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputProvince">Codigo Postal</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="cp" value='<?php echo  $_SESSION['logueado']->getCp();?>' required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span> 
                    </div>
<!----------------------------break-------------------------------------------------------------> <br>                     
                   </div>
                </div>

                  <div class="form-group">
                  <div class="input-group-addon">
                  <input type="submit" name="submit" id="submit" value="Editar" class="btn btn-success pull-right">
                  <a class="btn btn-info" href="perfil.php" role="button">Volver</a>

                  
                  </div>
                </div>
                </form>
              </div><!---modal-body--->
          </div>
       </div>

</body>
</html>